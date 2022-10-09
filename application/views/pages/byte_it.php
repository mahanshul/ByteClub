<div class="sidenav tab">
	<button class="tablinks" onclick="openTab(event, 'about')" id="defaultOpen">About</button>
	<button class="tablinks" onclick="openTab(event, 'rules')">Rules</button>
	<button class="tablinks" onclick="openTab(event, 'Stuff1')">Stuff<sub>1</sub></button>
</div>

<div id="about" id="defaultOpen" class="tabcontent">
	<img src="/public/graphics/byte_it.svg" alt="" style="width: 14rem; height: auto; display: block; margin: auto;">
	<h2 class="font-title" id="head_wrapper">
		<span id="byte_it_text">byte.IT 2018</span>
	</h2>
	<hr id="line" style="background-color: black; color: black; height: 0.8rem; border-radius:18%;" />
	<h3 style="text-align: center;">BBPS Pitampura's Annual Tech Fest</h3>
  <div id="bit_games_ad">
	<?php $this -> load -> view("components/bit_games_timer");?>
  </div>
  <div class="temp" style="width: 480px; height: 270px; background-color: black;">
    <h1 style="color: white; text-align: center; vertical-align: middle; padding-top: 50%; transform: translateY(-50%);">Promo video Goes here</h1>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		a = $("#byte_it_text").css("width");
		$("#line").css("width", a);
	});
	
</script>

<div id="rules" class="tabcontent">
	<h2>Rules</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias nobis vero aliquam labore quibusdam, dolor laboriosam temporibus, repellendus tenetur cumque optio incidunt. Pariatur eaque veritatis optio delectus at nemo expedita.</p>
<div class="wrapper">
  <section class="details-group">
    <?=$rules;?>
  </section>

  <script type="text/javascript">
  	class Details {
  constructor(el, settings = {}) {
    this.group    = el;
    this.details  = this.group.getElementsByClassName("details");
    this.toggles  = this.group.getElementsByClassName("details__summary");
    this.contents = this.group.getElementsByClassName("details__content");
    this.settings = {
      speed       : settings.speed       ? settings.speed       : 300,
      one_visible : settings.one_visible ? settings.one_visible : false
    }
  }
  
  open(i) {
    const detail = this.details[i];
    const toggle = this.toggles[i];
    const content = this.contents[i];
    
    // If applicable, hide all the other details first
    if (this.settings.one_visible) {
      for (let a = 0; a < this.toggles.length; a++) {
        if (i !== a) this.close(a);
      }
    }
    
    // Update class
    detail.classList.remove("is-closing");
    
    // Get height of toggle
    const toggle_height = toggle.clientHeight;
    
    // Momentarily show the contents just to get the height
    detail.setAttribute("open", true);
    const content_height = content.clientHeight;
    detail.removeAttribute("open");
    
    // Set the correct height and let CSS transition it
    detail.style.height = toggle_height + content_height + "px";
    
    // Finally set the open attr
    detail.setAttribute("open", true);
  }
  
  close(i) {
    const detail = this.details[i];
    const toggle = this.toggles[i];
    
    // Update class
    detail.classList.add("is-closing");
    
    // Get height of toggle
    const toggle_height = toggle.clientHeight;
    
    // Set the height so only the toggle is visible
    detail.style.height = toggle_height + "px";
    
    setTimeout(() => {
      // Check if still closing
      if (detail.classList.contains("is-closing"))
        detail.removeAttribute("open");
        detail.classList.remove("is-closing");
    }, this.settings.speed);
  }
    
  init() {
    const _this = this;
    
    // Setup toggle click
    for (let i = 0; i < _this.details.length; i++) {
      const detail  = _this.details[i];
      const toggle  = _this.toggles[i];
      const content = _this.contents[i];
      
      // Set transition-duration to match JS setting
      detail.style.transitionDuration = _this.settings.speed + "ms";
      
      // Set initial height to transition from
      if (!detail.hasAttribute("open")) {
        detail.style.height = toggle.clientHeight + "px";
      } else {
        detail.style.height = toggle.clientHeight + content.clientHeight + "px";
      }
      
      // Setup click listener
      toggle.addEventListener("click", (e) => {
        e.preventDefault();
        
        if (!detail.hasAttribute("open")) {
          _this.open(i);
        } else {
          _this.close(i);
        }
      });
    }
  }
}

(() => {
  const els = document.getElementsByClassName("details-group");
  
  for (let i = 0; i < els.length; i++) {
    const details = new Details(els[i], {
      speed: 200,
      one_visible: false
    });
    details.init();
  }
})();
  </script>
</div>
	
</div>

<div id="Stuff1" class="tabcontent">
	<h2>Stuff<sub>1</sub></h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore optio eveniet delectus, voluptate, corrupti expedita aliquid earum ab! Deserunt qui error vitae, facilis minima velit veritatis nihil placeat inventore blanditiis.</p>
</div>
