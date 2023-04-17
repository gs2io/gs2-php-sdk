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
use Gs2\Quest\Model\Reward;
use Gs2\Quest\Model\Config;

class EndByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var array */
    private $rewards;
    /** @var bool */
    private $isComplete;
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
	public function withNamespaceName(?string $namespaceName): EndByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): EndByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getRewards(): ?array {
		return $this->rewards;
	}
	public function setRewards(?array $rewards) {
		$this->rewards = $rewards;
	}
	public function withRewards(?array $rewards): EndByUserIdRequest {
		$this->rewards = $rewards;
		return $this;
	}
	public function getIsComplete(): ?bool {
		return $this->isComplete;
	}
	public function setIsComplete(?bool $isComplete) {
		$this->isComplete = $isComplete;
	}
	public function withIsComplete(?bool $isComplete): EndByUserIdRequest {
		$this->isComplete = $isComplete;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): EndByUserIdRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): EndByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?EndByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new EndByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRewards(array_map(
                function ($item) {
                    return Reward::fromJson($item);
                },
                array_key_exists('rewards', $data) && $data['rewards'] !== null ? $data['rewards'] : []
            ))
            ->withIsComplete(array_key_exists('isComplete', $data) ? $data['isComplete'] : null)
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
            "rewards" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRewards() !== null && $this->getRewards() !== null ? $this->getRewards() : []
            ),
            "isComplete" => $this->getIsComplete(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}