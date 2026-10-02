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

/**
 * Request for getEventByTransactionId: Get Event by specifying transaction ID
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#geteventbytransactionid
 */
class GetEventByTransactionIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Transaction ID */
    private $transactionId;
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
     * @return GetEventByTransactionIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetEventByTransactionIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return GetEventByTransactionIdRequest
     */
	public function withTransactionId(?string $transactionId): GetEventByTransactionIdRequest {
		$this->transactionId = $transactionId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventByTransactionIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEventByTransactionIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "transactionId" => $this->getTransactionId(),
        );
    }
}