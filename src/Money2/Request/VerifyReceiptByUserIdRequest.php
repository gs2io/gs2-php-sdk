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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Money2\Model\Receipt;

/**
 * Request for verifyReceiptByUserId: Mark a receipt as used by User ID
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#verifyreceiptbyuserid
 */
class VerifyReceiptByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Store Content Model name */
    private $contentName;
    /** @var Receipt Receipt */
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
     * @return VerifyReceiptByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyReceiptByUserIdRequest {
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
     * @return VerifyReceiptByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyReceiptByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Store Content Model name */
	public function getContentName(): ?string {
		return $this->contentName;
	}
    /** @param string|null $contentName Store Content Model name */
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
    /**
     * @param string|null $contentName Store Content Model name
     * @return VerifyReceiptByUserIdRequest
     */
	public function withContentName(?string $contentName): VerifyReceiptByUserIdRequest {
		$this->contentName = $contentName;
		return $this;
	}
    /** @return Receipt|null Receipt */
	public function getReceipt(): ?Receipt {
		return $this->receipt;
	}
    /** @param Receipt|null $receipt Receipt */
	public function setReceipt(?Receipt $receipt) {
		$this->receipt = $receipt;
	}
    /**
     * @param Receipt|null $receipt Receipt
     * @return VerifyReceiptByUserIdRequest
     */
	public function withReceipt(?Receipt $receipt): VerifyReceiptByUserIdRequest {
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
     * @return VerifyReceiptByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyReceiptByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyReceiptByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyReceiptByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyReceiptByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withReceipt(array_key_exists('receipt', $data) && $data['receipt'] !== null ? Receipt::fromJson($data['receipt']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "contentName" => $this->getContentName(),
            "receipt" => $this->getReceipt() !== null ? $this->getReceipt()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}