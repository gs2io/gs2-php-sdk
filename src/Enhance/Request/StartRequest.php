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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\Material;
use Gs2\Enhance\Model\Config;

class StartRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rateName;
    /** @var string */
    private $targetItemSetId;
    /** @var array */
    private $materials;
    /** @var string */
    private $accessToken;
    /** @var bool */
    private $force;
    /** @var array */
    private $config;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): StartRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): StartRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getTargetItemSetId(): ?string {
		return $this->targetItemSetId;
	}
	public function setTargetItemSetId(?string $targetItemSetId) {
		$this->targetItemSetId = $targetItemSetId;
	}
	public function withTargetItemSetId(?string $targetItemSetId): StartRequest {
		$this->targetItemSetId = $targetItemSetId;
		return $this;
	}
	public function getMaterials(): ?array {
		return $this->materials;
	}
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
	public function withMaterials(?array $materials): StartRequest {
		$this->materials = $materials;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): StartRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getForce(): ?bool {
		return $this->force;
	}
	public function setForce(?bool $force) {
		$this->force = $force;
	}
	public function withForce(?bool $force): StartRequest {
		$this->force = $force;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): StartRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): StartRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?StartRequest {
        if ($data === null) {
            return null;
        }
        return (new StartRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withTargetItemSetId(array_key_exists('targetItemSetId', $data) && $data['targetItemSetId'] !== null ? $data['targetItemSetId'] : null)
            ->withMaterials(!array_key_exists('materials', $data) || $data['materials'] === null ? null : array_map(
                function ($item) {
                    return Material::fromJson($item);
                },
                $data['materials']
            ))
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withForce(array_key_exists('force', $data) ? $data['force'] : null)
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "targetItemSetId" => $this->getTargetItemSetId(),
            "materials" => $this->getMaterials() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMaterials()
            ),
            "accessToken" => $this->getAccessToken(),
            "force" => $this->getForce(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
        );
    }
}