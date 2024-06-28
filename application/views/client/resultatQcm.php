<style>
    table{
        background-color: white;
    }
    table th{
        color: green;
        text-align: center;
    }
    #div{
        margin-top: 5%;
        height: 10%;
        color: green;
        background-color: red;
   }
   
</style>
<div class="container">
    <div class="row">  

        <table class="table table-bordered" style="margin-top: 3%;">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Poste</th>
            <th>Note</th>
            <th>Resultat</th>
            <?php for ($i=0; $i < count($qcmreponse); $i++) { ?>
            <tr id="tr">
                
                <td><?= $qcmreponse[0]['nom'] ?></td>
                <td><?= $qcmreponse[0]['prenom'] ?></td>
                <td><?= $qcmreponse[0]['services'] ?> : <?= $qcmreponse[0]['poste'] ?></td>
                <td class="points"><?= $qcmreponse[0]['points'] ?></td>
                <td class="reponse">

                <form id="form" style="display:none" action="<?= base_url('index.php/FrontOffice/Entretien?idcvAlefa=${idcvAlefa}') ?>" method="post">
                    <input type="hidden" name="idcv" value="<?= $qcmreponse[0]['idcv'] ?>">
                    <button style="display:none" type="submit">valider</button>
                </form>
                </td>
                
            </tr>
            <?php }?>
            
        </table>
    </div>
</div>

<script>
    const trs = document.querySelectorAll('tr');
    trs.forEach((tr) => {
        const points = tr.querySelector('.points');
        const resultat = tr.querySelector('.reponse');
        if (points) {
            const pointsValue = parseInt(points.textContent);
            if (pointsValue > 5) {
                tr.style.backgroundColor = '#a1ffd7';
            }
            if (pointsValue < 5) {
                tr.style.backgroundColor = '#ffacac';
                resultat.textContent="Refuser";
                resultat.style.cssText="color:red; text-align:center; font-style: italic";
            }
        }
    });
</script>