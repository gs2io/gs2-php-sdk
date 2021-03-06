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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Lottery\Model\Config;

class DrawByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $lotteryName;
    /** @var string */
    private $userId;
    /** @var int */
    private $count;
    /** @var array */
    private $config;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DrawByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}

	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}

	public function withLotteryName(?string $lotteryName): DrawByUserIdRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DrawByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): DrawByUserIdRequest {
		$this->count = $count;
		return $this;
	}

	public function getConfig(): ?array {
		return $this->config;
	}

	public function setConfig(?array $config) {
		$this->config = $config;
	}

	public function withConfig(?array $config): DrawByUserIdRequest {
		$this->config = $config;
		return $this;
	}

    public static function fromJson(?array $data): ?DrawByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DrawByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withLotteryName(empty($data['lotteryName']) ? null : $data['lotteryName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withCount(empty($data['count']) ? null : $data['count'])
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
            "lotteryName" => $this->getLotteryName(),
            "userId" => $this->getUserId(),
            "count" => $this->getCount(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}