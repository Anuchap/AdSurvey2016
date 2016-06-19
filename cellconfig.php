<?php
// Search
$b = new StdClass;
$b->totalCell = 'B';
$b->percentCell = null;
$b->percentType = 0;

// Display
$c = new StdClass;
$c->totalCell = 'C';
$c->percentCell = 'F';
$c->percentType = 1;
$c->detailCells = new StdClass;
$c->detailCells->direct = 'C';
$c->detailCells->adnetwork = 'D';
$c->detailCells->programetic = 'E';

// Online Video
$g = new StdClass; 
$g->totalCell = 'G';
$g->percentCell = 'J';
$g->percentType = 1;
$g->detailCells = new StdClass;
$g->detailCells->direct = 'G';
$g->detailCells->adnetwork = 'H';
$g->detailCells->programetic = 'I';

// Youtube Ad
$k = new StdClass; // special case level2 M,P
$k->totalCell = 'K';
$k->percentCell = 'P';
$k->percentType = 2;
$k->detailCells = new StdClass;
$k->detailCells->display = new StdClass;
$k->detailCells->display->cell = 'K';
$k->detailCells->display->desktop = 'K';
$k->detailCells->display->mobile = 'L';
$k->detailCells->video = new StdClass;
$k->detailCells->video->cell = 'N';
$k->detailCells->video->desktop = 'N';
$k->detailCells->video->mobile = 'O';

// Facebook Ad
$q = new StdClass; // special case level2 S,V
$q->totalCell = 'Q';
$q->percentCell = 'V';
$q->percentType = 2;
$q->detailCells = new StdClass;
$q->detailCells->display = new StdClass;
$q->detailCells->display->cell = 'Q';
$q->detailCells->display->desktop = 'Q';
$q->detailCells->display->mobile = 'R';
$q->detailCells->video = new StdClass;
$q->detailCells->video->cell = 'T';
$q->detailCells->video->desktop = 'T';
$q->detailCells->video->mobile = 'U';

// Instagram Ad
$w = new StdClass;
$w->totalCell = 'W';
$w->percentCell = 'Y';
$w->percentType = 3;
$w->detailCells = new StdClass;
$w->detailCells->display = 'W';
$w->detailCells->video = 'X';

// Twitter Ad 
$z = new StdClass;
$z->totalCell = 'Z';
$z->percentCell = null;
$z->percentType = 0;

// LINE
$aa = new StdClass;
$aa->totalCell = 'AA';
$aa->percentCell = null;
$aa->percentType = 0;

// Instant Messaging
$ab = new StdClass;
$ab->totalCell = 'AB';
$ab->percentCell = null;
$ab->percentType = 0;

// Social 
$ac = new StdClass;
$ac->totalCell = 'AC';
$ac->percentCell = null;
$ac->percentType = 0;

// Creative 
$ad = new StdClass;
$ad->totalCell = 'AD';
$ad->percentCell = 'AG';
$ad->percentType = 4;
$ad->detailCells = new StdClass;
$ad->detailCells->video = 'AD';
$ad->detailCells->banner = 'AE';
$ad->detailCells->social = 'AF';

// All Others/Sponsorship 
$ah = new StdClass;
$ah->totalCell = 'AH';
$ah->percentCell = null;
$ah->percentType = 0;

$cellConfig = array($b,$c,$g,$k,$q,$w,$z,$aa,$ab,$ac,$ad,$ah);
?>