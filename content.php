<?php $title = "The Midnight Menu";
/* HOME PAGE */$homepage = <<<END


The Midnight Menu
===========
<br />

The Midnight Menu was a late night food service for APU students living
in the dorms and mods. We were committed to delivering quality
mini-meals and snacks right to your door.

The Midnight Menu was the cheapest, easiest, and most reliable option on campus.

It was violently shut down on March 1st under suspicion
that it violated section 11.1 of the APU Policy.

Leave your condolences: <span id="pn">(909) 294-6368</span><br />
Or online: [Leave a message](./suggest.php)

* Drinks
  * Coke $1.00
  * Sprite $1.00
  * Monster $2.00
* Snacks
  * Pizza $2.00
  * Burrito $1.50
  * Candy &cent;95
  * Sun Chips &cent;75


END;
/* ORDER COMPLETE PAGE */$orderpage = <<<END

The Midnight Menu
===========
<br />
~ Thanks! ~
-----------

Thanks for ordering, your food is on its way!


END;
/* SUGGESTION PAGE */$suggestpage = <<<END

The Midnight Menu
===========
<br />
:)
-----------


<form action="./suggest.php" method="post">
Your name: <input type="text" name="name" /><br />
Message: <textarea type="text" name="suggestion"></textarea><br /><br />

<input type="submit" value="Submit" />
</form>

[< Back to home](./)


END;
?>
