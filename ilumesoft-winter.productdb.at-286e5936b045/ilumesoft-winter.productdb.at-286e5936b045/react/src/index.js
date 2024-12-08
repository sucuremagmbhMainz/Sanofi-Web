// Imports
import ReactDOM from 'react-dom'
import PDBList from "./pdb/PDBList/PDBList";

const e = React.createElement;

const pdbList = document.querySelector('#pdb-list');
ReactDOM.render(e(PDBList, {
    preview: pdbList.getAttribute('preview') == 'active' ? true : false
}), pdbList);
