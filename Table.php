<?php

/**
 * Class Table
 * */
class Table
{
	/**
	 * param headers - the headers for the table
	 * param data - the data for the table
	 * */
	private $headers = [];
	private $data = [];

	private $tableStyle = [];
	private $rowStyle = "";
	private $headerStyle = "";
	private $dataStyle = "";

	/**
	 * function to set all table headers
	 * param - headers: array
	 * example - ["id", "name", "email"]
	 * */
	public function setHeaders($headers)
	{
		$this->headers = $headers;
	}

	/**
	 * function to set a row of data
	 * param - data: array
	 * example - [1, "john", "john@gmail.com"]
	 * */
	public function setData($data)
	{
		if(count($this->headers) === count($data))
		{
			$this->data[] = $data;
		}
		else
		{
			throw new Exception("Data count cannot be more than header count");
		}
	}

	/**
	 * Add a css class to the <table> tag
	 * example - table
	 * 
	 * if you want to add multiple classes to the table tag
	 * use this function for multiple times
	 * */
	public function styleTable($class)
	{
		$this->tableStyle[] = $class;
	}

	/**
	 * Add a css class to <tr> tag
	 * If you want to add multiple classes add them like this:
	 * 		styleRow('table-row row-table');
	 * */
	public function styleRow($class)
	{
		$this->rowStyle = $class;
	}

	/**
	 * Add a css class to <th> tag
	 * If you want to add multiple classes add them like this:
	 * 		styleRow('table-head head-table');
	 * */
	public function styleHeader($class)
	{
		$this->headerStyle = $class;
	}

	/**
	 * Add a css class to <td> tag
	 * If you want to add multiple classes add them like this:
	 * 		styleRow('table-data data-table');
	 * */
	public function styleData($class)
	{
		$this->dataStyle = $class;
	}

	/**
	 * function to render the final output
	 * Call this only once
	 * */
	public function render()
	{
		/**
		 * If there are classes to add, adding them to the table tag
		 * */
		if(count($this->tableStyle) >= 1)
		{
			// Add all classes to one string separated with a space
			$tableClasses = "";
			foreach ($this->tableStyle as $key) {
				$tableClasses .= $key . " ";
			}

			echo "<table class='$tableClasses'>";
		}
		else
		{
			echo "<table>";
		}
		/**
		 * There must be atleast 1 header to render
		 * Otherwise it will throw an error
		 * */
		if(count($this->headers) >= 1)
		{
			echo "<tr class='$this->rowStyle'>";
			foreach ($this->headers as $key)
			{
				echo "<th class='$this->headerStyle'>". $key ."</th>";
			}
			echo "</tr>";
		}
		else
		{
			// Throwing the error
			throw new Exception("Cannot render a table without headers");
		}

		/**
		 * Rendering the table data as rows
		 * Must have atleast 1 row
		 * */
		if(count($this->data) >= 1)
		{
			foreach ($this->data as $key => $value) {
				echo "<tr class='$this->rowStyle'>";
				foreach ($value as $key2 => $value2) {
					echo "<td class='$this->dataStyle'>" . $value[$key2] . "</td>";
				}
				echo "</tr>";
			}
		}
		else
		{
			// Throwing the error
			throw new Exception("Table must have atleast 1 row of data");
		}
		echo "</table>";
	}
}