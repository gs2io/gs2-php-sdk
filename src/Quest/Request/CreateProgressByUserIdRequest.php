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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\Config;

class CreateProgressByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $questModelId;
    /** @var bool */
    private $force;
    /** @var array */
    private $config;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateProgressByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): CreateProgressByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}

	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}

	public function withQuestModelId(?string $questModelId): CreateProgressByUserIdRequest {
		$this->questModelId = $questModelId;
		return $this;
	}

	public function getForce(): ?bool {
		return $this->force;
	}

	public function setForce(?bool $force) {
		$this->force = $force;
	}

	public function withForce(?bool $force): CreateProgressByUserIdRequest {
		$this->force = $force;
		return $this;
	}

	public function getConfig(): ?array {
		return $this->config;
	}

	public function setConfig(?array $config) {
		$this->config = $config;
	}

	public function withConfig(?array $config): CreateProgressByUserIdRequest {
		$this->config = $config;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateProgressByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateProgressByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withQuestModelId(empty($data['questModelId']) ? null : $data['questModelId'])
            ->withForce(empty($data['force']) ? null : $data['force'])
            ->withConfig(array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "questModelId" => $this->getQuestModelId(),
            "force" => $this->getForce(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}