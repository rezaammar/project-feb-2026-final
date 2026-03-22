

    <h3>Daftar pasukan :</h3>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Bagian</th>
                <th scope="col">Email</th>
                <th scope="col">Skill</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php foreach($data['mhs'] as $mhs) : ?>
            <tr>
                <th scope="row"><?= $i;?></th>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['bagian']; ?></td>
                <td><?= $mhs['email']; ?></td>
                <td><?= $mhs['skill']; ?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>
        </tbody>
    </table>



            
