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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\Config;

/**
 * Request for createAwaitByUserId: Create Exchange Await by User ID
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#createawaitbyuserid
 */
class CreateAwaitByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Exchange Rate Model name */
    private $rateName;
    /** @var int Number of exchanges */
    private $count;
    /** @var array Default configuration values applied when obtaining rewards */
    private $config;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateAwaitByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateAwaitByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return CreateAwaitByUserIdRequest
     */
	public function withUserId(?string $userId): CreateAwaitByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Exchange Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Exchange Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Exchange Rate Model name
     * @return CreateAwaitByUserIdRequest
     */
	public function withRateName(?string $rateName): CreateAwaitByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return int|null Number of exchanges */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of exchanges */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of exchanges
     * @return CreateAwaitByUserIdRequest
     */
	public function withCount(?int $count): CreateAwaitByUserIdRequest {
		$this->count = $count;
		return $this;
	}
    /** @return array|null Default configuration values applied when obtaining rewards */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config Default configuration values applied when obtaining rewards */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config Default configuration values applied when obtaining rewards
     * @return CreateAwaitByUserIdRequest
     */
	public function withConfig(?array $config): CreateAwaitByUserIdRequest {
		$this->config = $config;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return CreateAwaitByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CreateAwaitByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateAwaitByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateAwaitByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateAwaitByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "count" => $this->getCount(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}