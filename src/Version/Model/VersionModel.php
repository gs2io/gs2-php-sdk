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


class VersionModel implements IModel {
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

	public function getVersionModelId(): ?string {
		return $this->versionModelId;
	}

	public function setVersionModelId(?string $versionModelId) {
		$this->versionModelId = $versionModelId;
	}

	public function withVersionModelId(?string $versionModelId): VersionModel {
		$this->versionModelId = $versionModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): VersionModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): VersionModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getWarningVersion(): ?Version {
		return $this->warningVersion;
	}

	public function setWarningVersion(?Version $warningVersion) {
		$this->warningVersion = $warningVersion;
	}

	public function withWarningVersion(?Version $warningVersion): VersionModel {
		$this->warningVersion = $warningVersion;
		return $this;
	}

	public function getErrorVersion(): ?Version {
		return $this->errorVersion;
	}

	public function setErrorVersion(?Version $errorVersion) {
		$this->errorVersion = $errorVersion;
	}

	public function withErrorVersion(?Version $errorVersion): VersionModel {
		$this->errorVersion = $errorVersion;
		return $this;
	}

	public function getScope(): ?string {
		return $this->scope;
	}

	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	public function withScope(?string $scope): VersionModel {
		$this->scope = $scope;
		return $this;
	}

	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}

	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}

	public function withCurrentVersion(?Version $currentVersion): VersionModel {
		$this->currentVersion = $currentVersion;
		return $this;
	}

	public function getNeedSignature(): ?bool {
		return $this->needSignature;
	}

	public function setNeedSignature(?bool $needSignature) {
		$this->needSignature = $needSignature;
	}

	public function withNeedSignature(?bool $needSignature): VersionModel {
		$this->needSignature = $needSignature;
		return $this;
	}

	public function getSignatureKeyId(): ?string {
		return $this->signatureKeyId;
	}

	public function setSignatureKeyId(?string $signatureKeyId) {
		$this->signatureKeyId = $signatureKeyId;
	}

	public function withSignatureKeyId(?string $signatureKeyId): VersionModel {
		$this->signatureKeyId = $signatureKeyId;
		return $this;
	}

    public static function fromJson(?array $data): ?VersionModel {
        if ($data === null) {
            return null;
        }
        return (new VersionModel())
            ->withVersionModelId(empty($data['versionModelId']) ? null : $data['versionModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withWarningVersion(empty($data['warningVersion']) ? null : Version::fromJson($data['warningVersion']))
            ->withErrorVersion(empty($data['errorVersion']) ? null : Version::fromJson($data['errorVersion']))
            ->withScope(empty($data['scope']) ? null : $data['scope'])
            ->withCurrentVersion(empty($data['currentVersion']) ? null : Version::fromJson($data['currentVersion']))
            ->withNeedSignature(empty($data['needSignature']) ? null : $data['needSignature'])
            ->withSignatureKeyId(empty($data['signatureKeyId']) ? null : $data['signatureKeyId']);
    }

    public function toJson(): array {
        return array(
            "versionModelId" => $this->getVersionModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "warningVersion" => $this->getWarningVersion() !== null ? $this->getWarningVersion()->toJson() : null,
            "errorVersion" => $this->getErrorVersion() !== null ? $this->getErrorVersion()->toJson() : null,
            "scope" => $this->getScope(),
            "currentVersion" => $this->getCurrentVersion() !== null ? $this->getCurrentVersion()->toJson() : null,
            "needSignature" => $this->getNeedSignature(),
            "signatureKeyId" => $this->getSignatureKeyId(),
        );
    }
}