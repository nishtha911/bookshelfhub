package com.bookshelfhub;

import javax.servlet.ServletException;
import javax.servlet.http.*;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.*;
import java.util.concurrent.atomic.AtomicInteger;

public class BookServlet extends HttpServlet {

    private AtomicInteger counter;   
    private String url, user, pass;  

    @Override
    public void init() throws ServletException {
        System.out.println("BookServlet init() called"); 

        counter = new AtomicInteger(0);

        url  = "jdbc:mysql://localhost:3306/bookshelfhub?useSSL=false&serverTimezone=UTC";
        user = "root";
        pass = "root";

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");  
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
    }

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {

        resp.setContentType("text/html;charset=UTF-8");
        PrintWriter out = resp.getWriter();

        HttpSession session = req.getSession();
        String userName = (String) session.getAttribute("userName");

        if (userName == null) {
            userName = "GuestUser";
            session.setAttribute("userName", userName);
        }

        String lastVisit = "None";
        Cookie[] cookies = req.getCookies();
        if (cookies != null) {
            for (Cookie c : cookies) {
                if (c.getName().equals("lastVisit")) {
                    lastVisit = c.getValue();
                }
            }
        }

        Cookie visitCookie = new Cookie("lastVisit", java.time.Instant.now().toString());
        visitCookie.setMaxAge(60*60*24*7); 
        resp.addCookie(visitCookie);

        out.println("<html><body>");
        out.println("<h2>BookShelf Hub - All Books</h2>");

        out.println("<p>Welcome: <b>" + userName + "</b></p>");
        out.println("<p>Last Visit: " + lastVisit + "</p>");

        out.println("<p><a href=\"addBook.html\">Add Another Book</a></p>");

        out.println("<table border='1' cellpadding='6'>");
        out.println("<tr><th>ID</th><th>Title</th><th>Author</th><th>Rating</th></tr>");

        try (Connection conn = DriverManager.getConnection(url, user, pass)) {
            String sql = "SELECT * FROM books ORDER BY id DESC";
            PreparedStatement ps = conn.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();

            while (rs.next()) {
                out.println("<tr>");
                out.println("<td>" + rs.getInt("id") + "</td>");
                out.println("<td>" + rs.getString("title") + "</td>");
                out.println("<td>" + rs.getString("author") + "</td>");
                out.println("<td>" + rs.getInt("rating") + "</td>");
                out.println("</tr>");
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        out.println("</table>");
        out.println("</body></html>");
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {

        req.setCharacterEncoding("UTF-8");

        String title  = req.getParameter("title");
        String author = req.getParameter("author");
        int rating    = Integer.parseInt(req.getParameter("rating"));

        int bookNumber = counter.incrementAndGet();

        try (Connection conn = DriverManager.getConnection(url, user, pass)) {
            String sql = "INSERT INTO books (title, author, rating) VALUES (?, ?, ?)";
            PreparedStatement ps = conn.prepareStatement(sql);
            ps.setString(1, title);
            ps.setString(2, author);
            ps.setInt(3, rating);
            ps.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }

        String encodedURL = resp.encodeRedirectURL("book");
        resp.sendRedirect(encodedURL);
    }

    @Override
    public void destroy() {
        System.out.println("BookServlet destroy() called"); 
    }
}
