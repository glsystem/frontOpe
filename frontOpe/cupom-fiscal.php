<!doctype html>
<html>
  <head>
      <style> 
          .text-center {
            text-align: center;
          }
          .ttu {
            text-transform: uppercase;
          }
          .printer-ticket {
            display: table !important;
            width: 100%;
            max-width: 400px;
            font-weight: light;
            line-height: 1.3em;
          }
          .printer-ticket,
          .printer-ticket * {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 10px;
          }
          .printer-ticket th:nth-child(2),
          .printer-ticket td:nth-child(2) {
            width: 50px;
          }
          .printer-ticket th:nth-child(3),
          .printer-ticket td:nth-child(3) {
            width: 90px;
            text-align: right;
          }
          .printer-ticket th {
            font-weight: inherit;
            padding: 10px 0;
            text-align: center;
            border-bottom: 1px dashed #BCBCBC;
          }
          .printer-ticket tbody tr:last-child td {
            padding-bottom: 10px;
          }
          .printer-ticket tfoot .sup td {
            padding: 10px 0;
            border-top: 1px dashed #BCBCBC;
          }
          .printer-ticket tfoot .sup.p--0 td {
            padding-bottom: 0;
          }
          .printer-ticket .title {
            font-size: 1.5em;
            padding: 15px 0;
          }
          .printer-ticket .top td {
            padding-top: 10px;
          }
          .printer-ticket .last td {
            padding-bottom: 10px;
          }
      </style>
    <title>Jinja2 Smallest Sample!</title>
  </head>
  <body>
    <div style="background-color: bisque; width: 21%; margin:auto">
        <table class="printer-ticket">
            <thead>
             <tr>
               <th class="title" colspan="3">Food n'Cup</th>
             </tr>
             <tr>
               <th colspan="3">2019-05-17</th>
             </tr>
             <tr>
               <th colspan="3">
                 Vinicius <br />
                 46715817871
               </th>
             </tr>
             <tr>
               <th class="ttu" colspan="3">
                 <b>Cupom não fiscal</b>
               </th>
             </tr>
           </thead>
           <tbody>
             <tr class="top">
               <td colspan="3">Coxinha</td>
             </tr>
             <tr>
               <td>R$4,50</td>
               <td>2.0</td>
               <td>R$9,00</td>
             </tr>
             <tr class="top">
               <td colspan="3">Suco</td>
             </tr>
             <tr>
               <td>R$5,00</td>
               <td>1.0</td>
               <td>R$5,00</td>
             </tr>
           </tbody>
           <tfoot>
             <tr class="sup ttu p--0">
               <td colspan="3">
                 <b>Totais</b>
               </td>
             </tr>

             <tr class="ttu">
               <td colspan="2">Total</td>
               <td align="right">R$14,00</td>
             </tr>
             <tr class="sup ttu p--0">
               <td colspan="3">
                 <b>Pagamentos</b>
               </td>
             </tr>
             <tr class="ttu">
               <td colspan="2">Dinheiro</td>
               <td align="right">R$14,00</td>
             </tr>
             <tr class="ttu">
               <td colspan="2">Total pago</td>
               <td align="right">R$14,00</td>
             </tr>
             <tr class="ttu">
               <td colspan="2">Troco</td>
               <td align="right">R$0,00</td>
             </tr>
             <tr class="sup">
               <td colspan="3" align="center">
                 <b>Pedido: 67859403</b>
               </td>
             </tr>
             <tr class="sup">
               <td colspan="3" align="center">
                 www.foodncup.com.br
               </td>
             </tr>
           </tfoot>
         </table>
    </div>
  </body>
</html>