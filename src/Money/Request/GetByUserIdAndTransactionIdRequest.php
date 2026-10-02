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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getByUserIdAndTransactionId: Get receipt by specifying user ID and transaction ID
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#getbyuseridandtransactionid
 */
class GetByUserIdAndTransactionIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Transaction ID */
    private $transactionId;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetByUserIdAndTransactionIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetByUserIdAndTransactionIdRequest {
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
     * @return GetByUserIdAndTransactionIdRequest
     */
	public function withUserId(?string $userId): GetByUserIdAndTransactionIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return GetByUserIdAndTransactionIdRequest
     */
	public function withTransactionId(?string $transactionId): GetByUserIdAndTransactionIdRequest {
		$this->transactionId = $transactionId;
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
     * @return GetByUserIdAndTransactionIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetByUserIdAndTransactionIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetByUserIdAndTransactionIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetByUserIdAndTransactionIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}