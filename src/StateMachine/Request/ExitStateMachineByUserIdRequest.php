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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for exitStateMachineByUserId: Exit and delete state machine by User ID
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#exitstatemachinebyuserid
 */
class ExitStateMachineByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Status name */
    private $statusName;
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
     * @return ExitStateMachineByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ExitStateMachineByUserIdRequest {
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
     * @return ExitStateMachineByUserIdRequest
     */
	public function withUserId(?string $userId): ExitStateMachineByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Status name */
	public function getStatusName(): ?string {
		return $this->statusName;
	}
    /** @param string|null $statusName Status name */
	public function setStatusName(?string $statusName) {
		$this->statusName = $statusName;
	}
    /**
     * @param string|null $statusName Status name
     * @return ExitStateMachineByUserIdRequest
     */
	public function withStatusName(?string $statusName): ExitStateMachineByUserIdRequest {
		$this->statusName = $statusName;
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
     * @return ExitStateMachineByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ExitStateMachineByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ExitStateMachineByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ExitStateMachineByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ExitStateMachineByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStatusName(array_key_exists('statusName', $data) && $data['statusName'] !== null ? $data['statusName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "statusName" => $this->getStatusName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}