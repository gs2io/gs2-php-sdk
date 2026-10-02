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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\ScopedValue;

/**
 * Request for resetCounterByUserId: Reset counter by User ID
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#resetcounterbyuserid
 */
class ResetCounterByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Counter Model name */
    private $counterName;
    /** @var array List of scopes */
    private $scopes;
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
     * @return ResetCounterByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ResetCounterByUserIdRequest {
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
     * @return ResetCounterByUserIdRequest
     */
	public function withUserId(?string $userId): ResetCounterByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Counter Model name */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /** @param string|null $counterName Counter Model name */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @param string|null $counterName Counter Model name
     * @return ResetCounterByUserIdRequest
     */
	public function withCounterName(?string $counterName): ResetCounterByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}
    /** @return array|null List of scopes */
	public function getScopes(): ?array {
		return $this->scopes;
	}
    /** @param array|null $scopes List of scopes */
	public function setScopes(?array $scopes) {
		$this->scopes = $scopes;
	}
    /**
     * @param array|null $scopes List of scopes
     * @return ResetCounterByUserIdRequest
     */
	public function withScopes(?array $scopes): ResetCounterByUserIdRequest {
		$this->scopes = $scopes;
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
     * @return ResetCounterByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ResetCounterByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ResetCounterByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ResetCounterByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ResetCounterByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withScopes(!array_key_exists('scopes', $data) || $data['scopes'] === null ? null : array_map(
                function ($item) {
                    return ScopedValue::fromJson($item);
                },
                $data['scopes']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "counterName" => $this->getCounterName(),
            "scopes" => $this->getScopes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScopes()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}