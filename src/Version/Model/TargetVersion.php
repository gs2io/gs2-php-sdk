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


class TargetVersion implements IModel {
	/**
     * @var string
	 */
	private $versionName;
	/**
     * @var Version
	 */
	private $version;
	/**
     * @var string
	 */
	private $body;
	/**
     * @var string
	 */
	private $signature;

	public function getVersionName(): ?string {
		return $this->versionName;
	}

	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	public function withVersionName(?string $versionName): TargetVersion {
		$this->versionName = $versionName;
		return $this;
	}

	public function getVersion(): ?Version {
		return $this->version;
	}

	public function setVersion(?Version $version) {
		$this->version = $version;
	}

	public function withVersion(?Version $version): TargetVersion {
		$this->version = $version;
		return $this;
	}

	public function getBody(): ?string {
		return $this->body;
	}

	public function setBody(?string $body) {
		$this->body = $body;
	}

	public function withBody(?string $body): TargetVersion {
		$this->body = $body;
		return $this;
	}

	public function getSignature(): ?string {
		return $this->signature;
	}

	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	public function withSignature(?string $signature): TargetVersion {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?TargetVersion {
        if ($data === null) {
            return null;
        }
        return (new TargetVersion())
            ->withVersionName(empty($data['versionName']) ? null : $data['versionName'])
            ->withVersion(empty($data['version']) ? null : Version::fromJson($data['version']))
            ->withBody(empty($data['body']) ? null : $data['body'])
            ->withSignature(empty($data['signature']) ? null : $data['signature']);
    }

    public function toJson(): array {
        return array(
            "versionName" => $this->getVersionName(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}