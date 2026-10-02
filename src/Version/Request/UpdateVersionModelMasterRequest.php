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
 * Request for updateVersionModelMaster: Update Version Model Master
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#updateversionmodelmaster
 */
class UpdateVersionModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Version Model name */
    private $versionName;
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateVersionModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Version Model name */
	public function getVersionName(): ?string {
		return $this->versionName;
	}
    /** @param string|null $versionName Version Model name */
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}
    /**
     * @param string|null $versionName Version Model name
     * @return UpdateVersionModelMasterRequest
     */
	public function withVersionName(?string $versionName): UpdateVersionModelMasterRequest {
		$this->versionName = $versionName;
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withDescription(?string $description): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withScope(?string $scope): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withType(?string $type): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withCurrentVersion(?Version $currentVersion): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withWarningVersion(?Version $warningVersion): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withErrorVersion(?Version $errorVersion): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withScheduleVersions(?array $scheduleVersions): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withNeedSignature(?bool $needSignature): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withSignatureKeyId(?string $signatureKeyId): UpdateVersionModelMasterRequest {
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
     * @return UpdateVersionModelMasterRequest
     */
	public function withApproveRequirement(?string $approveRequirement): UpdateVersionModelMasterRequest {
		$this->approveRequirement = $approveRequirement;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateVersionModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateVersionModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
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
            "versionName" => $this->getVersionName(),
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