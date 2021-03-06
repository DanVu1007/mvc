<h1>Students</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="/mvc/student/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new student</a>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>gender</th>
                <th>birdthday</th>
                <th>address</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($students as $student) {
            echo '<tr>';
            echo "<td>" . $student->getId() . "</td>";
            echo "<td>" . $student->getName() . "</td>";
            $gender = ($student->getGender()==1) ? 'nam' : 'nữ';
            echo "<td>" . $gender . "</td>";
            echo "<td>" . $student->getBirthday ()  . "</td>";
            echo "<td>" . $student->getAddress() . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/mvc/student/edit/" . $student->getId() . "' >
            <span class='glyphicon glyphicon-edit'></span> Edit</a> 
            <a href='/mvc/student/delete/" . $student->getId() . "' class='btn btn-danger btn-xs'>
            <span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>