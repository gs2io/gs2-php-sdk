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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Account\Model\BanStatus;

/**
 * Request for addBan: Add the Account Ban Status for a Game Player Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#addban
 */
class AddBanRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var BanStatus Ban status */
    private $banStatus;
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
     * @return AddBanRequest
     */
	public function withNamespaceName(?string $namespaceName): AddBanRequest {
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
     * @return AddBanRequest
     */
	public function withUserId(?string $userId): AddBanRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return BanStatus|null Ban status */
	public function getBanStatus(): ?BanStatus {
		return $this->banStatus;
	}
    /** @param BanStatus|null $banStatus Ban status */
	public function setBanStatus(?BanStatus $banStatus) {
		$this->banStatus = $banStatus;
	}
    /**
     * @param BanStatus|null $banStatus Ban status
     * @return AddBanRequest
     */
	public function withBanStatus(?BanStatus $banStatus): AddBanRequest {
		$this->banStatus = $banStatus;
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
     * @return AddBanRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AddBanRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AddBanRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AddBanRequest {
        if ($data === null) {
            return null;
        }
        return (new AddBanRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withBanStatus(array_key_exists('banStatus', $data) && $data['banStatus'] !== null ? BanStatus::fromJson($data['banStatus']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "banStatus" => $this->getBanStatus() !== null ? $this->getBanStatus()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}