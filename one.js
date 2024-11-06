function changeFrame(style) {
    const frameElement = document.getElementById('frame');

    switch (style) {
        case 'dotted':
            frameElement.style.border = "5px dotted #ff5733";  // Orange dotted border
            break;
        case 'solid':
            frameElement.style.border = "5px solid #007bff";   // Blue solid border
            break;
        case 'double':
            frameElement.style.border = "10px double #28a745"; // Green double border
            break;
        case 'groove':
            frameElement.style.border = "6px groove #6f42c1";  // Purple groove border
            break;
        default:
            frameElement.style.border = "5px solid #000";      // Default solid black border
    }
}
