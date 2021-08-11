<html>

<head>
    <title>Lokasi</title>
</head>

<body>
    <form action="" method="POST">
        <input type="hidden" name="latitude" id="latitude" value="">
        <input type="hidden" name="longitude" id="longitude" value="">
        <input type="submit" name="submit" value="Ambil Lokasi">
    </form>
    <table>
        <tr>
            <td>Latitude</td>
            <td>:</td>
            <td><?php echo @$_POST['latitude']; ?></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td>:</td>
            <td><?php echo @$_POST['longitude']; ?></td>
        </tr>
    </table>
    <script>
        window.onload = function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Yah browsernya ngga support Geolocation bro!");
            }
        }

        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;

            console.log('latitude : ' + position.coords.latitude);
            console.log('longitude : ' + position.coords.longitude)
        }
    </script>
</body>

</html>