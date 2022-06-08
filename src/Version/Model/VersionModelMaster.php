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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;


class VersionModelMaster implements IModel {
	/**
     * @var string
	 */
	private $versionModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var Version
	 */
	private $warningVersion;
	/**
     * @var Version
	 */
	private $errorVersion;
	/**
     * @var string
	 */
	private $scope;
	/**
     * @var Version
	 */
	private $currentVersion;
	/**
     * @var bool
	 */
	private $needSignature;
	/**
     * @var string
	 */
	private $signatureKeyId;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getVersionModelId(): ?string {
		return $this->versionModelId;
	}
	public function setVersionModelId(?string $versionModelId) {
		$this->versionModelId = $versionModelId;
	}
	public function withVersionModelId(?string $versionModelId): VersionModelMaster {
		$this->versionModelId = $versionModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): VersionModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): VersionModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): VersionModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getWarningVersion(): ?Version {
		return $this->warningVersion;
	}
	public function setWarningVersion(?Version $warningVersion) {
		$this->warningVersion = $warningVersion;
	}
	public function withWarningVersion(?Version $warningVersion): VersionModelMaster {
		$this->warningVersion = $warningVersion;
		return $this;
	}
	public function getErrorVersion(): ?Version {
		return $this->errorVersion;
	}
	public function setErrorVersion(?Version $errorVersion) {
		$this->errorVersion = $errorVersion;
	}
	public function withErrorVersion(?Version $errorVersion): VersionModelMaster {
		$this->errorVersion = $errorVersion;
		return $this;
	}
	public function getScope(): ?string {
		return $this->scope;
	}
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
	public function withScope(?string $scope): VersionModelMaster {
		$this->scope = $scope;
		return $this;
	}
	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}
	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}
	public function withCurrentVersion(?Version $currentVersion): VersionModelMaster {
		$this->currentVersion = $currentVersion;
		return $this;
	}
	public function getNeedSignature(): ?bool {
		return $this->needSignature;
	}
	public function setNeedSignature(?bool $needSignature) {
		$this->needSignature = $needSignature;
	}
	public function withNeedSignature(?bool $needSignature): VersionModelMaster {
		$this->needSignature = $needSignature;
		return $this;
	}
	public function getSignatureKeyId(): ?string {
		return $this->signatureKeyId;
	}
	public function setSignatureKeyId(?string $signatureKeyId) {
		$this->signatureKeyId = $signatureKeyId;
	}
	public function withSignatureKeyId(?string $signatureKeyId): VersionModelMaster {
		$this->signatureKeyId = $signatureKeyId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): VersionModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): VersionModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?VersionModelMaster {
        if ($data === null) {
            return null;
        }
        return (new VersionModelMaster())
            ->withVersionModelId(array_key_exists('versionModelId', $data) && $data['versionModelId'] !== null ? $data['versionModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withWarningVersion(array_key_exists('warningVersion', $data) && $data['warningVersion'] !== null ? Version::fromJson($data['warningVersion']) : null)
            ->withErrorVersion(array_key_exists('errorVersion', $data) && $data['errorVersion'] !== null ? Version::fromJson($data['errorVersion']) : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withCurrentVersion(array_key_exists('currentVersion', $data) && $data['currentVersion'] !== null ? Version::fromJson($data['currentVersion']) : null)
            ->withNeedSignature(array_key_exists('needSignature', $data) ? $data['needSignature'] : null)
            ->withSignatureKeyId(array_key_exists('signatureKeyId', $data) && $data['signatureKeyId'] !== null ? $data['signatureKeyId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "versionModelId" => $this->getVersionModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "warningVersion" => $this->getWarningVersion() !== null ? $this->getWarningVersion()->toJson() : null,
            "errorVersion" => $this->getErrorVersion() !== null ? $this->getErrorVersion()->toJson() : null,
            "scope" => $this->getScope(),
            "currentVersion" => $this->getCurrentVersion() !== null ? $this->getCurrentVersion()->toJson() : null,
            "needSignature" => $this->getNeedSignature(),
            "signatureKeyId" => $this->getSignatureKeyId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}