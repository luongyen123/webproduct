		</div>
	</div>
</div> <!-- Dong div container o left --><?php echo '<div class="text-center">Render time: ';$this->benchmark->mark('code_end');echo $this->benchmark->elapsed_time('code_start', 'code_end');echo '</div>';?>