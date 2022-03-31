
<?php

include_once('../DatabasePhpFile/DbConnection.php');
		$obj=new db();

		$conn=$obj->connect();

		include_once('../DatabasePhpFile/crud.php');
		$crud=new Crud();



/* PRODUCT Type */
        /*ADD*/
                    //$crud->Ptype_Add("US",$conn);
        /*Delete */
                    //$crud->Ptype_delete(3,$conn);
         /*Update */
                   //$crud->Ptype_update(1,"Syrup",$conn);

        /*Select */
                  //$crud->Ptype_Select($conn);

/* PRODUCT Type End*/




/* PRODUCT */

/*  ADD */
$crud->Product_Add("OHRS DE42","OHRS42",700,"Organic High Maltose Brown Rice Syrup DE42",12,1,$conn);

/*  Delete */
//$crud->Product_delete("SRN 70",$conn);


/*  Update */
//$crud->Product_update("SRN 70","SRN70",670,"Sorbitol 70% Non Crystalizing",0.0,2,$conn);

/*Select */

//$crud->Product_Select($conn);
/*end Product */



/* Container */
        /*ADD */
                    //$crud->Container_Add(60,14,$conn);
        /*Delete */
                    //$crud->Container_delete(3,$conn);
         /*Update */
                    //$crud->Container_update(2,60,14,$conn);

        /*Select */
                  //$crud->Container_Select($conn);

/* Container End*/


/* duties */
        /*ADD*/
                    //$crud->duties_Add("US",1,4.9,$conn);
        /*Delete */
                    //$crud->duties_delete(1,$conn);
         /*Update */
                   //$crud->duties_update(5,"US",1,4.9,$conn);

        /*Select */
                  //$crud->duties_Select($conn);

/* duties End*/

/* pallettype */
        /*ADD*/
                    //$crud->pallettype_Add("US",1,4.9,$conn);
        /*Delete */
                    //$crud->pallettype_delete(3,$conn);
         /*Update */
                 //$crud->pallettype_update(2,"Wood",11.176,19,$conn);

        /*Select */
                 //$crud->pallettype_Select($conn);

/* pallettype End*/


/* package*/
           /*ADD*/
                    //$crud->package_Add("Paper IBC",129,1.365,16,19,0.03,22.5,1,$conn);
        /*Delete */
                    //$crud->package_delete(3,$conn);
         /*Update */
                 //$crud->package_update(6,"Paper IBC",129,1.365,16,19,0.03,24.5,1,$conn);

        /*Select */
                // $crud->package_Select($conn);
/* package */
?>
