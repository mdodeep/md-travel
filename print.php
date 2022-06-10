<?php
 $path =  'https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://project.mdody.com/tugaskuliah/imk/checkin.php';
 $type = pathinfo($path, PATHINFO_EXTENSION);
 $data = file_get_contents($path);
 $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

 echo $base64;
 ?>
 <img src="data:image/php;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAQMAAABKLAcXAAAABlBMVEX///8AAABVwtN+AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABNUlEQVQ4jZXUMW6EMBAF0LEo3NkXQHANF5F8JdOlwnTbhStZouAajriA6VwgT4ZkyWqLnYXpXjHmz2AAeCqPKHAUc2kRIysHUgfX4lCD4NXhTUxDA31t14tSFhvjzggqCpfe6jeZx6weOU+JZlcf7nv+OjbxUlQ0Q3ms9KQ83orFaPwyK156+1zpPSBipmScHHUGaO5POK++zSI4DAqk4tVtUkwY7QAy8fIbrNN/svMS0YsAmPUy0ymslqynhKFvKdwFUU66S5jdkfqlKFmpRkF9eY2sXC3XTbeBlkl9F1RljSnKMRrFa7/X4MFozBhZUSlLyRTYS6J7rYOmLdU2ASvaDrVG6MHAFe1fMR1FY+X0XtUg5nWZ718/J/BtpoQFLujvn1VA1Vbx2mefsJhuOzZxTk/1AyStSV2hfJbsAAAAAElFTkSuQmCC">