<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Version\Model\Version;
use Gs2\Version\Model\ScheduleVersion;

/**
 * Request for createVersionModelMaster: Create Version Model Master
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#createversionmodelmaster
 */
class CreateVersionModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Version Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Type of version value used for judgment */
    private $scope;
    /** @var string Version Check Mode */
    private $type;
    /** @var Version Current Version */
    private $currentVersion;
    /** @var Version Version that prompts for version upgrade */
    private $warningVersion;
    /** @var Version Version that is determined to be an error by the version check */
    private $errorVersion;
    /** @var array List of Version check content that switches over time series */
    private $scheduleVersions;
    /** @var bool Whether the version value to be determined requires signature verification */
    private $needSignature;
    /** @var string Encryption Key GRN */
    private $signatureKeyId;
    /** @var string Requirement for approval */
    private $approveRequirement;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateVersionModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateVersionModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Version Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Version Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Version Model name
     * @return CreateVersionModelMasterRequest
     */
	public function withName(?string $name): CreateVersionModelMasterRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateVersionModelMasterRequest
     */
	public function withDescription(?string $description): CreateVersionModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return CreateVersionModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateVersionModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Type of version value used for judgment */
	public function getScope(): ?string {
		return $this->scope;
	}
    /** @param string|null $scope Type of version value used for judgment */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
    /**
     * @param string|null $scope Type of version value used for judgment
     * @return CreateVersionModelMasterRequest
     */
	public function withScope(?string $scope): CreateVersionModelMasterRequest {
		$this->scope = $scope;
		return $this;
	}
    /** @return string|null Version Check Mode */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Version Check Mode */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Version Check Mode
     * @return CreateVersionModelMasterRequest
     */
	public function withType(?string $type): CreateVersionModelMasterRequest {
		$this->type = $type;
		return $this;
	}
    /** @return Version|null Current Version */
	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}
    /** @param Version|null $currentVersion Current Version */
	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}
    /**
     * @param Version|null $currentVersion Current Version
     * @return CreateVersionModelMasterRequest
     */
	public function withCurrentVersion(?Version $currentVersion): CreateVersionModelMasterRequest {
		$this->currentVersion = $currentVersion;
		return $this;
	}
    /** @return Version|null Version that prompts for version upgrade */
	public function getWarningVersion(): ?Version {
		return $this->warningVersion;
	}
    /** @param Version|null $warningVersion Version that prompts for version upgrade */
	public function setWarningVersion(?Version $warningVersion) {
		$this->warningVersion = $warningVersion;
	}
    /**
     * @param Version|null $warningVersion Version that prompts for version upgrade
     * @return CreateVersionModelMasterRequest
     */
	public function withWarningVersion(?Version $warningVersion): CreateVersionModelMasterRequest {
		$this->warningVersion = $warningVersion;
		return $this;
	}
    /** @return Version|null Version that is determined to be an error by the version check */
	public function getErrorVersion(): ?Version {
		return $this->errorVersion;
	}
    /** @param Version|null $errorVersion Version that is determined to be an error by the version check */
	public function setErrorVersion(?Version $errorVersion) {
		$this->errorVersion = $errorVersion;
	}
    /**
     * @param Version|null $errorVersion Version that is determined to be an error by the version check
     * @return CreateVersionModelMasterRequest
     */
	public function withErrorVersion(?Version $errorVersion): CreateVersionModelMasterRequest {
		$this->errorVersion = $errorVersion;
		return $this;
	}
    /** @return array|null List of Version check content that switches over time series */
	public function getScheduleVersions(): ?array {
		return $this->scheduleVersions;
	}
    /** @param array|null $scheduleVersions List of Version check content that switches over time series */
	public function setScheduleVersions(?array $scheduleVersions) {
		$this->scheduleVersions = $scheduleVersions;
	}
    /**
     * @param array|null $scheduleVersions List of Version check content that switches over time series
     * @return CreateVersionModelMasterRequest
     */
	public function withScheduleVersions(?array $scheduleVersions): CreateVersionModelMasterRequest {
		$this->scheduleVersions = $scheduleVersions;
		return $this;
	}
    /** @return bool|null Whether the version value to be determined requires signature verification */
	public function getNeedSignature(): ?bool {
		return $this->needSignature;
	}
    /** @param bool|null $needSignature Whether the version value to be determined requires signature verification */
	public function setNeedSignature(?bool $needSignature) {
		$this->needSignature = $needSignature;
	}
    /**
     * @param bool|null $needSignature Whether the version value to be determined requires signature verification
     * @return CreateVersionModelMasterRequest
     */
	public function withNeedSignature(?bool $needSignature): CreateVersionModelMasterRequest {
		$this->needSignature = $needSignature;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getSignatureKeyId(): ?string {
		return $this->signatureKeyId;
	}
    /** @param string|null $signatureKeyId Encryption Key GRN */
	public function setSignatureKeyId(?string $signatureKeyId) {
		$this->signatureKeyId = $signatureKeyId;
	}
    /**
     * @param string|null $signatureKeyId Encryption Key GRN
     * @return CreateVersionModelMasterRequest
     */
	public function withSignatureKeyId(?string $signatureKeyId): CreateVersionModelMasterRequest {
		$this->signatureKeyId = $signatureKeyId;
		return $this;
	}
    /** @return string|null Requirement for approval */
	public function getApproveRequirement(): ?string {
		return $this->approveRequirement;
	}
    /** @param string|null $approveRequirement Requirement for approval */
	public function setApproveRequirement(?string $approveRequirement) {
		$this->approveRequirement = $approveRequirement;
	}
    /**
     * @param string|null $approveRequirement Requirement for approval
     * @return CreateVersionModelMasterRequest
     */
	public function withApproveRequirement(?string $approveRequirement): CreateVersionModelMasterRequest {
		$this->approveRequirement = $approveRequirement;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateVersionModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateVersionModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withCurrentVersion(array_key_exists('currentVersion', $data) && $data['currentVersion'] !== null ? Version::fromJson($data['currentVersion']) : null)
            ->withWarningVersion(array_key_exists('warningVersion', $data) && $data['warningVersion'] !== null ? Version::fromJson($data['warningVersion']) : null)
            ->withErrorVersion(array_key_exists('errorVersion', $data) && $data['errorVersion'] !== null ? Version::fromJson($data['errorVersion']) : null)
            ->withScheduleVersions(!array_key_exists('scheduleVersions', $data) || $data['scheduleVersions'] === null ? null : array_map(
                function ($item) {
                    return ScheduleVersion::fromJson($item);
                },
                $data['scheduleVersions']
            ))
            ->withNeedSignature(array_key_exists('needSignature', $data) ? $data['needSignature'] : null)
            ->withSignatureKeyId(array_key_exists('signatureKeyId', $data) && $data['signatureKeyId'] !== null ? $data['signatureKeyId'] : null)
            ->withApproveRequirement(array_key_exists('approveRequirement', $data) && $data['approveRequirement'] !== null ? $data['approveRequirement'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "scope" => $this->getScope(),
            "type" => $this->getType(),
            "currentVersion" => $this->getCurrentVersion() !== null ? $this->getCurrentVersion()->toJson() : null,
            "warningVersion" => $this->getWarningVersion() !== null ? $this->getWarningVersion()->toJson() : null,
            "errorVersion" => $this->getErrorVersion() !== null ? $this->getErrorVersion()->toJson() : null,
            "scheduleVersions" => $this->getScheduleVersions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScheduleVersions()
            ),
            "needSignature" => $this->getNeedSignature(),
            "signatureKeyId" => $this->getSignatureKeyId(),
            "approveRequirement" => $this->getApproveRequirement(),
        );
    }
}