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

class CreateBillingMethodRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountToken;
    /** @var string */
    private $description;
    /** @var string */
    private $methodType;
    /** @var string */
    private $cardCustomerId;
    /** @var string */
    private $partnerId;

	public function getAccountToken(): ?string {
		return $this->accountToken;
	}

	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}

	public function withAccountToken(?string $accountToken): CreateBillingMethodRequest {
		$this->accountToken = $accountToken;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateBillingMethodRequest {
		$this->description = $description;
		return $this;
	}

	public function getMethodType(): ?string {
		return $this->methodType;
	}

	public function setMethodType(?string $methodType) {
		$this->methodType = $methodType;
	}

	public function withMethodType(?string $methodType): CreateBillingMethodRequest {
		$this->methodType = $methodType;
		return $this;
	}

	public function getCardCustomerId(): ?string {
		return $this->cardCustomerId;
	}

	public function setCardCustomerId(?string $cardCustomerId) {
		$this->cardCustomerId = $cardCustomerId;
	}

	public function withCardCustomerId(?string $cardCustomerId): CreateBillingMethodRequest {
		$this->cardCustomerId = $cardCustomerId;
		return $this;
	}

	public function getPartnerId(): ?string {
		return $this->partnerId;
	}

	public function setPartnerId(?string $partnerId) {
		$this->partnerId = $partnerId;
	}

	public function withPartnerId(?string $partnerId): CreateBillingMethodRequest {
		$this->partnerId = $partnerId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateBillingMethodRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateBillingMethodRequest())
            ->withAccountToken(empty($data['accountToken']) ? null : $data['accountToken'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMethodType(empty($data['methodType']) ? null : $data['methodType'])
            ->withCardCustomerId(empty($data['cardCustomerId']) ? null : $data['cardCustomerId'])
            ->withPartnerId(empty($data['partnerId']) ? null : $data['partnerId']);
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