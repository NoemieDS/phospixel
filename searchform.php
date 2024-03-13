<?php

/**
 * Formulaire de recherche personnalisée
 * 
 */
?>
<form class="rechercher-form wrapper-entete-pied" role="search" method="get" autocomplete=”off” action="<?php echo esc_url(home_url('/')); ?>">
  <label>
  <input type="search" class="rechercher-input" autocomplete="off" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>"  name="s" />
    <button type="submit" class="rechercher-bouton">
    <span class="rechercher-icone">
    
<svg  id="loupe-12032024" xmlns="http://www.w3.org/2000/svg" width="125" viewBox="0 0 400 400">
  <title>Rechercher</title>
  <style>

    .loupe-anim-12032024 {
      stroke: hsla(220, 100%, 80%, 1);
      stroke-width: 6px;
      fill: hsla(220, 5%, 4%, 1);
      stroke-dashoffset: -5980.6611328125;
      stroke-dasharray: 5980.6611328125;
      animation: anim-loupe-anim-12032024 3s ease infinite;
    }

    .st0-12032024 {
      stroke-width: 2px;
      stroke-miterlimit: 10;
    }

    .st1-12032024 {
      fill: hsla(220, 5%, 4%, 1);
    }

    .st2-12032024 {
      fill: none;
      stroke: hsl(220, 100%, 30%);
      stroke-width: 5px;
      stroke-miterlimit: 10;
    }

    @keyframes anim-loupe-anim-12032024 {
      0% {
        stroke-dashoffset: -5980.6611328125;
      }

      50% {
        stroke: hsla(220, 100%, 30%, 1);
      
      }

      100% {
        stroke-dashoffset: 5980.6611328125;
               fill: hsla(220, 100%, 30%, 1);
      }
    }
  </style>

  <g class="loupe-anim-12032024">
    <line class="st0-12032024" x1="234.4" y1="167.8" x2="345" y2="89.7" />
    <path class="st1-12032024" d="M341.2,305.9c0,0-65.9-66.1-83.5-83.7c49.4-56.8,41.1-162.9-56.2-188.1C55.6,1.7,3.6,217.8,148.3,255.1
	c28.5,6.3,53.3,3.2,73.9-6.2c12,17.3,68.7,98.9,68.7,98.9c15.2,20.8,36.3-7.9,49-16.7C347.8,324.5,348.4,313.1,341.2,305.9z
	 M79.1,121.6c32.4-125.3,219.6-80.3,191.5,46C238.2,293,51,247.9,79.1,121.6z" />
    <path class="st2-12032024" d="M364.1,59.9c-24.5-5.5-33.2,30.9-8.9,37.1C379.7,102.5,388.5,66.2,364.1,59.9z" />
    <line class="st0-12032024" x1="183.8" y1="145.7" x2="213.4" y2="166.4" />
    <path class="st2-12032024" d="M170.9,107c-30.6-6.8-41.4,38.5-11.1,46.3C190.3,160.1,201.2,114.9,170.9,107z" />
    <line class="st0-12032024" x1="159.9" y1="199.1" x2="166.1" y2="154" />
    <path class="st2-12032024" d="M161.2,199.4c-16.9-4-23,21.6-6.2,25.8C171.9,229.1,178.1,203.5,161.2,199.4z" />
    <line class="st0-12032024" x1="47.3" y1="29.4" x2="146.9" y2="115.2" />
    <path class="st2-12032024" d="M40.9,8.3c-16.9-4-23,21.6-6.2,25.8C51.6,38,57.8,12.4,40.9,8.3z" />
    <line class="st0-12032024" x1="195.5" y1="91.1" x2="183" y2="113.9" />
    <path class="st2-12032024" d="M234.1,173.3c-3.4,13.9-24.6,8.8-21.3-5.1C216.3,154.2,237.4,159.3,234.1,173.3z" />
    <line class="st0-12032024" x1="35.1" y1="220.2" x2="144.8" y2="141.9" />
    <path class="st2-12032024" d="M201.5,75.7C191,73,187,89.5,197.6,91.9C208.1,94.6,212,78,201.5,75.7z" />
    <path class="st2-12032024" d="M27.7,214.8c-16.9-4-23,21.6-6.2,25.8C38.3,244.5,44.5,218.9,27.7,214.8z" />
  </g>
</svg>
      </span> 
    </button>
  </label>
</form>