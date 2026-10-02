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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Receipt of store platform
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#receipt
 */
class Receipt implements IModel {
	/**
     * @var string Store
	 */
	private $store;
	/**
     * @var string Transaction ID
	 */
	private $transactionID;
	/**
     * @var string Payload
	 */
	private $payload;
    /** @return string|null Store */
	public function getStore(): ?string {
		return $this->store;
	}
    /** @param string|null $store Store */
	public function setStore(?string $store) {
		$this->store = $store;
	}
    /**
     * @param string|null $store Store
     * @return Receipt
     */
	public function withStore(?string $store): Receipt {
		$this->store = $store;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionID(): ?string {
		return $this->transactionID;
	}
    /** @param string|null $transactionID Transaction ID */
	public function setTransactionID(?string $transactionID) {
		$this->transactionID = $transactionID;
	}
    /**
     * @param string|null $transactionID Transaction ID
     * @return Receipt
     */
	public function withTransactionID(?string $transactionID): Receipt {
		$this->transactionID = $transactionID;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return Receipt
     */
	public function withPayload(?string $payload): Receipt {
		$this->payload = $payload;
		return $this;
	}

    public static function fromJson(?array $data): ?Receipt {
        if ($data === null) {
            return null;
        }
        return (new Receipt())
            ->withStore(array_key_exists('Store', $data) && $data['Store'] !== null ? $data['Store'] : null)
            ->withTransactionID(array_key_exists('TransactionID', $data) && $data['TransactionID'] !== null ? $data['TransactionID'] : null)
            ->withPayload(array_key_exists('Payload', $data) && $data['Payload'] !== null ? $data['Payload'] : null);
    }

    public function toJson(): array {
        return array(
            "Store" => $this->getStore(),
            "TransactionID" => $this->getTransactionID(),
            "Payload" => $this->getPayload(),
        );
    }
}