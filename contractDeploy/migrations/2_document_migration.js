const Documents = artifacts.require("Document");

module.exports = function (deployer) {
  deployer.deploy(Documents);
};
