<!DOCTYPE html>
<html>
    <head>
        <title>Imprimer un tableau en PDF</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            th {
                background-color: #4CAF50;
                color: white;
            }

        </style>
    </head>
    <body>
        <button id="printButton">Imprimer en PDF</button>
        <table id="table">
            <thead>
                <tr>
                    <th>Colonne 1</th>
                    <th>Colonne 2</th>
                    <th>Colonne 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Donnée 1</td>
                    <td>Donnée 2</td>
                    <td>Donnée 3</td>
                </tr>
                <tr>
                    <td>Donnée 4</td>
                    <td>Donnée 5</td>
                    <td>Donnée 6</td>
                </tr>
            </tbody>
        </table>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        
        <script src="jspdf.min.js"></script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.js"></script>

        <script>
            document.getElementById('printButton').addEventListener('click', function () {
                var doc = new jsPDF();
                doc.autoTable({html: '#table'});
                doc.save('tableau.pdf');
            });
        </script>
    </body>
</html>
