<html>
    <head>
        <title>Upload Form</title>
    </head>
    <body>

        <?php echo isset($status) ? $status : " "; ?>

        <?php echo form_open_multipart('teste/setUpload'); ?>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

    </form>

</body>
</html>