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
 * Request for verifyReceipt: Record receipt
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#verifyreceipt
 */
class VerifyReceiptRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Store Content Model name */
    private $contentName;
    /** @var Receipt Receipt */
    private $receipt;
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
     * @return VerifyReceiptRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyReceiptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return VerifyReceiptRequest
     */
	public function withAccessToken(?string $accessToken): VerifyReceiptRequest {
		$this->accessToken = $accessToken;
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
     * @return VerifyReceiptRequest
     */
	public function withContentName(?string $contentName): VerifyReceiptRequest {
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
     * @return VerifyReceiptRequest
     */
	public function withReceipt(?Receipt $receipt): VerifyReceiptRequest {
		$this->receipt = $receipt;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyReceiptRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyReceiptRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyReceiptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withReceipt(array_key_exists('receipt', $data) && $data['receipt'] !== null ? Receipt::fromJson($data['receipt']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "contentName" => $this->getContentName(),
            "receipt" => $this->getReceipt() !== null ? $this->getReceipt()->toJson() : null,
        );
    }
}