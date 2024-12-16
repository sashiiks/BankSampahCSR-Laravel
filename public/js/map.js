function initMap() {
    const locations = [
        { name: "PT Indocement Tunggal Prakarsa Tbk", lat: -6.48716, lng: 106.88079 },
        { name: "Citeureup", lat: -6.48333, lng: 106.87194 },
        { name: "Puspa Negara", lat: -6.48905, lng: 106.88438 },
        { name: "Tarikolot", lat: -6.49612, lng: 106.89322 },
        { name: "Gunung Sari", lat: -6.50123, lng: 106.85125 },
        { name: "Pasir Mukti", lat: -6.51158, lng: 106.84436 },
        { name: "Tajur", lat: -6.51845, lng: 106.83392 },
        { name: "Hambalang", lat: -6.52345, lng: 106.82845 },
        { name: "Lewih Karet", lat: -6.53156, lng: 106.82136 },
        { name: "Lulut", lat: -6.53875, lng: 106.81428 },
        { name: "Bantarjati", lat: -6.54623, lng: 106.80345 },
        { name: "Nambo", lat: -6.55412, lng: 106.79654 },
        { name: "Desa Gunung Putri", lat: -6.56745, lng: 106.77921 },
    ];

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: -6.48716, lng: 106.88079 }, // Fokus awal pada PT Indocement
    });

    const icons = {
        citeureup: "https://maps.google.com/mapfiles/ms/icons/red-dot.png",
        kelapaNunggal: "https://maps.google.com/mapfiles/ms/icons/orange-dot.png",
        gunungPutri: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
        indocement: "https://maps.google.com/mapfiles/ms/icons/green-dot.png", // Ikon untuk PT Indocement
    };

    // Fungsi untuk menentukan ikon berdasarkan lokasi
    function getIcon(locationName) {
        if (locationName.includes("Citeureup") || ["Puspa Negara", "Tarikolot", "Gunung Sari", "Pasir Mukti", "Tajur", "Hambalang"].includes(locationName)) {
            return icons.citeureup;
        }
        if (locationName.includes("Kelapa Nunggal") || ["Lewih Karet", "Lulut", "Bantarjati", "Nambo"].includes(locationName)) {
            return icons.kelapaNunggal;
        }
        if (locationName.includes("Gunung Putri") || ["Desa Gunung Putri"].includes(locationName)) {
            return icons.gunungPutri;
        }
        if (locationName.includes("Indocement")) {
            return icons.indocement;
        }
        return icons.citeureup; // Default icon jika tidak ada kecocokan
    }

    const infoWindow = new google.maps.InfoWindow();

    locations.forEach(location => {
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map,
            title: location.name,
            icon: getIcon(location.name),
        });

        // Event untuk Info Window
        marker.addListener("click", () => {
            infoWindow.setContent(`<strong>${location.name}</strong>`);
            infoWindow.open(map, marker);
        });
    });
}
