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

/** Request for createBillingMethod: Create payment method */
class CreateBillingMethodRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Description */
    private $description;
    /** @var string Payment Method */
    private $methodType;
    /** @var string Credit Card Customer ID */
    private $cardCustomerId;
    /** @var string Partner ID */
    private $partnerId;
    /** @return string|null Signed in to the account token. */
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}
    /** @param string|null $accountToken Signed in to the account token. */
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}
    /**
     * @param string|null $accountToken Signed in to the account token.
     * @return CreateBillingMethodRequest
     */
	public function withAccountToken(?string $accountToken): CreateBillingMethodRequest {
		$this->accountToken = $accountToken;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateBillingMethodRequest
     */
	public function withDescription(?string $description): CreateBillingMethodRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Payment Method */
	public function getMethodType(): ?string {
		return $this->methodType;
	}
    /** @param string|null $methodType Payment Method */
	public function setMethodType(?string $methodType) {
		$this->methodType = $methodType;
	}
    /**
     * @param string|null $methodType Payment Method
     * @return CreateBillingMethodRequest
     */
	public function withMethodType(?string $methodType): CreateBillingMethodRequest {
		$this->methodType = $methodType;
		return $this;
	}
    /** @return string|null Credit Card Customer ID */
	public function getCardCustomerId(): ?string {
		return $this->cardCustomerId;
	}
    /** @param string|null $cardCustomerId Credit Card Customer ID */
	public function setCardCustomerId(?string $cardCustomerId) {
		$this->cardCustomerId = $cardCustomerId;
	}
    /**
     * @param string|null $cardCustomerId Credit Card Customer ID
     * @return CreateBillingMethodRequest
     */
	public function withCardCustomerId(?string $cardCustomerId): CreateBillingMethodRequest {
		$this->cardCustomerId = $cardCustomerId;
		return $this;
	}
    /** @return string|null Partner ID */
	public function getPartnerId(): ?string {
		return $this->partnerId;
	}
    /** @param string|null $partnerId Partner ID */
	public function setPartnerId(?string $partnerId) {
		$this->partnerId = $partnerId;
	}
    /**
     * @param string|null $partnerId Partner ID
     * @return CreateBillingMethodRequest
     */
	public function withPartnerId(?string $partnerId): CreateBillingMethodRequest {
		$this->partnerId = $partnerId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateBillingMethodRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateBillingMethodRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMethodType(array_key_exists('methodType', $data) && $data['methodType'] !== null ? $data['methodType'] : null)
            ->withCardCustomerId(array_key_exists('cardCustomerId', $data) && $data['cardCustomerId'] !== null ? $data['cardCustomerId'] : null)
            ->withPartnerId(array_key_exists('partnerId', $data) && $data['partnerId'] !== null ? $data['partnerId'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "description" => $this->getDescription(),
            "methodType" => $this->getMethodType(),
            "cardCustomerId" => $this->getCardCustomerId(),
            "partnerId" => $this->getPartnerId(),
        );
    }
}