<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>

  <body >
    <h2>Our Team</h2>
    <table border="5" width="100%"   >
      <tr  bgcolor="Grey" >
       
        <th>---Name---</th>
        <th>---Gender---</th>
        <th>---Age---</th>
        <th>---Job---</th>
        <th>---Email---</th>
        <th>---Phone---</th>
      </tr>
      <xsl:for-each select="employees/employee">
      <tr>
      
        <td><xsl:value-of select="name"/></td>
        <td><xsl:value-of select="gender"/></td>
        <td><xsl:value-of select="age"/></td>
        <td><xsl:value-of select="position"/></td>
        <td><xsl:value-of select="email"/></td>
        <td><xsl:value-of select="phone"/></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>