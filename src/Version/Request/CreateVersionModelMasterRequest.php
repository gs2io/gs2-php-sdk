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

class CreateVersionModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $scope;
    /** @var string */
    private $type;
    /** @var Version */
    private $currentVersion;
    /** @var Version */
    private $warningVersion;
    /** @var Version */
    private $errorVersion;
    /** @var array */
    private $scheduleVersions;
    /** @var bool */
    private $needSignature;
    /** @var string */
    private $signatureKeyId;
    /** @var string */
    private $approveRequirement;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateVersionModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateVersionModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateVersionModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateVersionModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getScope(): ?string {
		return $this->scope;
	}
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
	public function withScope(?string $scope): CreateVersionModelMasterRequest {
		$this->scope = $scope;
		return $this;
	}
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): CreateVersionModelMasterRequest {
		$this->type = $type;
		return $this;
	}
	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}
	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}
	public function withCurrentVersion(?Version $currentVersion): CreateVersionModelMasterRequest {
		$this->currentVersion = $currentVersion;
		return $this;
	}
	public function getWarningVersion(): ?Version {
		return $this->warningVersion;
	}
	public function setWarningVersion(?Version $warningVersion) {
		$this->warningVersion = $warningVersion;
	}
	public function withWarningVersion(?Version $warningVersion): CreateVersionModelMasterRequest {
		$this->warningVersion = $warningVersion;
		return $this;
	}
	public function getErrorVersion(): ?Version {
		return $this->errorVersion;
	}
	public function setErrorVersion(?Version $errorVersion) {
		$this->errorVersion = $errorVersion;
	}
	public function withErrorVersion(?Version $errorVersion): CreateVersionModelMasterRequest {
		$this->errorVersion = $errorVersion;
		return $this;
	}
	public function getScheduleVersions(): ?array {
		return $this->scheduleVersions;
	}
	public function setScheduleVersions(?array $scheduleVersions) {
		$this->scheduleVersions = $scheduleVersions;
	}
	public function withScheduleVersions(?array $scheduleVersions): CreateVersionModelMasterRequest {
		$this->scheduleVersions = $scheduleVersions;
		return $this;
	}
	public function getNeedSignature(): ?bool {
		return $this->needSignature;
	}
	public function setNeedSignature(?bool $needSignature) {
		$this->needSignature = $needSignature;
	}
	public function withNeedSignature(?bool $needSignature): CreateVersionModelMasterRequest {
		$this->needSignature = $needSignature;
		return $this;
	}
	public function getSignatureKeyId(): ?string {
		return $this->signatureKeyId;
	}
	public function setSignatureKeyId(?string $signatureKeyId) {
		$this->signatureKeyId = $signatureKeyId;
	}
	public function withSignatureKeyId(?string $signatureKeyId): CreateVersionModelMasterRequest {
		$this->signatureKeyId = $signatureKeyId;
		return $this;
	}
	public function getApproveRequirement(): ?string {
		return $this->approveRequirement;
	}
	public function setApproveRequirement(?string $approveRequirement) {
		$this->approveRequirement = $approveRequirement;
	}
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
            ->withScheduleVersions(array_map(
                function ($item) {
                    return ScheduleVersion::fromJson($item);
                },
                array_key_exists('scheduleVersions', $data) && $data['scheduleVersions'] !== null ? $data['scheduleVersions'] : []
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
            "scheduleVersions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScheduleVersions() !== null && $this->getScheduleVersions() !== null ? $this->getScheduleVersions() : []
            ),
            "needSignature" => $this->getNeedSignature(),
            "signatureKeyId" => $this->getSignatureKeyId(),
            "approveRequirement" => $this->getApproveRequirement(),
        );
    }
}