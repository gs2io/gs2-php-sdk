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


/**
 * Version to be verified
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#targetversion
 */
class TargetVersion implements IModel {
	/**
     * @var string Version Model name
	 */
	private $versionName;
	/**
     * @var string Body
	 */
	private $body;
	/**
     * @var string Signature
	 */
	private $signature;
	/**
     * @var Version Version
	 */
	private $version;
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
     * @return TargetVersion
     */
	public function withVersionName(?string $versionName): TargetVersion {
		$this->versionName = $versionName;
		return $this;
	}
    /** @return string|null Body */
	public function getBody(): ?string {
		return $this->body;
	}
    /** @param string|null $body Body */
	public function setBody(?string $body) {
		$this->body = $body;
	}
    /**
     * @param string|null $body Body
     * @return TargetVersion
     */
	public function withBody(?string $body): TargetVersion {
		$this->body = $body;
		return $this;
	}
    /** @return string|null Signature */
	public function getSignature(): ?string {
		return $this->signature;
	}
    /** @param string|null $signature Signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}
    /**
     * @param string|null $signature Signature
     * @return TargetVersion
     */
	public function withSignature(?string $signature): TargetVersion {
		$this->signature = $signature;
		return $this;
	}
    /** @return Version|null Version */
	public function getVersion(): ?Version {
		return $this->version;
	}
    /** @param Version|null $version Version */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}
    /**
     * @param Version|null $version Version
     * @return TargetVersion
     */
	public function withVersion(?Version $version): TargetVersion {
		$this->version = $version;
		return $this;
	}

    public static function fromJson(?array $data): ?TargetVersion {
        if ($data === null) {
            return null;
        }
        return (new TargetVersion())
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? Version::fromJson($data['version']) : null);
    }

    public function toJson(): array {
        return array(
            "versionName" => $this->getVersionName(),
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
        );
    }
}