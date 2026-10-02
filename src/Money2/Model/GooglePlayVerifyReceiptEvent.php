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
 * Google Play Receipt Verification Event
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#googleplayverifyreceiptevent
 */
class GooglePlayVerifyReceiptEvent implements IModel {
	/**
     * @var string Purchase Token
	 */
	private $purchaseToken;
    /** @return string|null Purchase Token */
	public function getPurchaseToken(): ?string {
		return $this->purchaseToken;
	}
    /** @param string|null $purchaseToken Purchase Token */
	public function setPurchaseToken(?string $purchaseToken) {
		$this->purchaseToken = $purchaseToken;
	}
    /**
     * @param string|null $purchaseToken Purchase Token
     * @return GooglePlayVerifyReceiptEvent
     */
	public function withPurchaseToken(?string $purchaseToken): GooglePlayVerifyReceiptEvent {
		$this->purchaseToken = $purchaseToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GooglePlayVerifyReceiptEvent {
        if ($data === null) {
            return null;
        }
        return (new GooglePlayVerifyReceiptEvent())
            ->withPurchaseToken(array_key_exists('purchaseToken', $data) && $data['purchaseToken'] !== null ? $data['purchaseToken'] : null);
    }

    public function toJson(): array {
        return array(
            "purchaseToken" => $this->getPurchaseToken(),
        );
    }
}