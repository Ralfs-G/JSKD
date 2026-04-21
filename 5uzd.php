<script>
    fetch('5.data.json', {
            method: 'POST'
        })
        .then(response => response.json())
        .then(items => {
            items.forEach(item => createItem(item))
        })
        .catch (
            error => console.error("Can't load data: ", error)
        )
</script>

<?php
$file_name = '5.data.json';

if (file_exists($file_name)) {
    echo file_get_contents($file_name); 
} else {
    echo "[]";
}
