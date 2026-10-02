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
 * Request for recordReceipt: Record receipt
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#recordreceipt
 */
class RecordReceiptRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Content IDs sold on the store platform */
    private $contentsId;
    /** @var string Receipt */
    private $receipt;
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
     * @return RecordReceiptRequest
     */
	public function withNamespaceName(?string $namespaceName): RecordReceiptRequest {
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
     * @return RecordReceiptRequest
     */
	public function withUserId(?string $userId): RecordReceiptRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Content IDs sold on the store platform */
	public function getContentsId(): ?string {
		return $this->contentsId;
	}
    /** @param string|null $contentsId Content IDs sold on the store platform */
	public function setContentsId(?string $contentsId) {
		$this->contentsId = $contentsId;
	}
    /**
     * @param string|null $contentsId Content IDs sold on the store platform
     * @return RecordReceiptRequest
     */
	public function withContentsId(?string $contentsId): RecordReceiptRequest {
		$this->contentsId = $contentsId;
		return $this;
	}
    /** @return string|null Receipt */
	public function getReceipt(): ?string {
		return $this->receipt;
	}
    /** @param string|null $receipt Receipt */
	public function setReceipt(?string $receipt) {
		$this->receipt = $receipt;
	}
    /**
     * @param string|null $receipt Receipt
     * @return RecordReceiptRequest
     */
	public function withReceipt(?string $receipt): RecordReceiptRequest {
		$this->receipt = $receipt;
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
     * @return RecordReceiptRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): RecordReceiptRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): RecordReceiptRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?RecordReceiptRequest {
        if ($data === null) {
            return null;
        }
        return (new RecordReceiptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withContentsId(array_key_exists('contentsId', $data) && $data['contentsId'] !== null ? $data['contentsId'] : null)
            ->withReceipt(array_key_exists('receipt', $data) && $data['receipt'] !== null ? $data['receipt'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "contentsId" => $this->getContentsId(),
            "receipt" => $this->getReceipt(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}