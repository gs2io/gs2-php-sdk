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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class WaitDumpUserDataRequest extends Gs2BasicRequest {
    /** @var string */
    private $ownerId;
    /** @var string */
    private $transactionId;
    /** @var string */
    private $userId;
    /** @var string */
    private $microserviceName;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}
	public function withOwnerId(?string $ownerId): WaitDumpUserDataRequest {
		$this->ownerId = $ownerId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): WaitDumpUserDataRequest {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): WaitDumpUserDataRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getMicroserviceName(): ?string {
		return $this->microserviceName;
	}
	public function setMicroserviceName(?string $microserviceName) {
		$this->microserviceName = $microserviceName;
	}
	public function withMicroserviceName(?string $microserviceName): WaitDumpUserDataRequest {
		$this->microserviceName = $microserviceName;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): WaitDumpUserDataRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): WaitDumpUserDataRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?WaitDumpUserDataRequest {
        if ($data === null) {
            return null;
        }
        return (new WaitDumpUserDataRequest())
            ->withOwnerId(array_key_exists('ownerId', $data) && $data['ownerId'] !== null ? $data['ownerId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMicroserviceName(array_key_exists('microserviceName', $data) && $data['microserviceName'] !== null ? $data['microserviceName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "ownerId" => $this->getOwnerId(),
            "transactionId" => $this->getTransactionId(),
            "userId" => $this->getUserId(),
            "microserviceName" => $this->getMicroserviceName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}