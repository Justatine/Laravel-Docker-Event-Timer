<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="h-full flex flex-col">

    @include('components.header')

    <div class="container flex-grow p-8">
        @yield('content')
    </div>

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
document.addEventListener("DOMContentLoaded", () => {
    const tableElement = document.getElementById("selection-table");
    if (tableElement && typeof simpleDatatables.DataTable !== 'undefined') {
        let multiSelect = true;
        let rowNavigation = false;
        let table = null;

        const resetTable = function() {
            if (table) {
                table.destroy();
                table = null;
            }

            const options = {
                rowRender: (row, tr, _index) => {
                    if (!tr.attributes) {
                        tr.attributes = {};
                    }
                    if (!tr.attributes.class) {
                        tr.attributes.class = "";
                    }
                    tr.attributes.class = row.selected ? "selected" : tr.attributes.class.replace(" selected", "");
                    return tr;
                }
            };

            if (rowNavigation) {
                options.rowNavigation = true;
                options.tabIndex = 1;
            }

            table = new simpleDatatables.DataTable(tableElement, options);

            // Mark all rows as unselected
            table.data.data.forEach(data => {
                data.selected = false;
            });

            table.on("datatable.selectrow", (rowIndex, event) => {
                event.preventDefault();
                const row = table.data.data[rowIndex];
                row.selected = !row.selected;

                if (!multiSelect && row.selected) {
                    table.data.data.forEach((data, idx) => {
                        if (idx !== rowIndex) data.selected = false;
                    });
                }

                table.update();
            });
        };

        // Disable row navigation on mobile
        if (window.matchMedia("(any-pointer:coarse)").matches) {
            rowNavigation = false;
        }

        resetTable();
    }
});
    </script>
</body>
</html>
