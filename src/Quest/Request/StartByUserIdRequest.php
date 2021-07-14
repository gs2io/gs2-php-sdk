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

class StartByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $questGroupName;
    /** @var string */
    private $questName;
    /** @var string */
    private $userId;
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

	public function withNamespaceName(?string $namespaceName): StartByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}

	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}

	public function withQuestGroupName(?string $questGroupName): StartByUserIdRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}

	public function getQuestName(): ?string {
		return $this->questName;
	}

	public function setQuestName(?string $questName) {
		$this->questName = $questName;
	}

	public function withQuestName(?string $questName): StartByUserIdRequest {
		$this->questName = $questName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): StartByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getForce(): ?bool {
		return $this->force;
	}

	public function setForce(?bool $force) {
		$this->force = $force;
	}

	public function withForce(?bool $force): StartByUserIdRequest {
		$this->force = $force;
		return $this;
	}

	public function getConfig(): ?array {
		return $this->config;
	}

	public function setConfig(?array $config) {
		$this->config = $config;
	}

	public function withConfig(?array $config): StartByUserIdRequest {
		$this->config = $config;
		return $this;
	}

    public static function fromJson(?array $data): ?StartByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new StartByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withQuestGroupName(empty($data['questGroupName']) ? null : $data['questGroupName'])
            ->withQuestName(empty($data['questName']) ? null : $data['questName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
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
            "questGroupName" => $this->getQuestGroupName(),
            "questName" => $this->getQuestName(),
            "userId" => $this->getUserId(),
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