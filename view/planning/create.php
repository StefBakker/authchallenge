<h1>Create examen</h1>

<div class="container">
    <h2>TODO: make this form valid for planning an exam</h2>
    <form action="<?= URL ?>planning/createSave" method="post">

        <div class="form-group">
            <label for="exam_id">Examen:</label>
            <select name="exam_id" >
                <?php foreach($exam_id_names as $exam_id) {
                    echo '<option value="'.$exam_id['id'] .'">'.$exam_id['name'] .'</option><br>' . PHP_EOL;
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exam_id">Student:</label>
            <select name="student_id" >
                <?php foreach($student_id_names as $student_id) {
                    echo '<option value="'.$student_id['id'] .'">'.$student_id['name'] .'</option><br>' . PHP_EOL;
                } ?>
            </select>
        </div>

        <input type="text" name="lastname" placeholder="doe">
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <input type="submit" value="Verzenden">

    </form>

</div>