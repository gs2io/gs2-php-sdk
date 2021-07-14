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

class UpdateBillingMethodRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountToken;
    /** @var string */
    private $billingMethodName;
    /** @var string */
    private $description;

	public function getAccountToken(): ?string {
		return $this->accountToken;
	}

	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}

	public function withAccountToken(?string $accountToken): UpdateBillingMethodRequest {
		$this->accountToken = $accountToken;
		return $this;
	}

	public function getBillingMethodName(): ?string {
		return $this->billingMethodName;
	}

	public function setBillingMethodName(?string $billingMethodName) {
		$this->billingMethodName = $billingMethodName;
	}

	public function withBillingMethodName(?string $billingMethodName): UpdateBillingMethodRequest {
		$this->billingMethodName = $billingMethodName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateBillingMethodRequest {
		$this->description = $description;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBillingMethodRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateBillingMethodRequest())
            ->withAccountToken(empty($data['accountToken']) ? null : $data['accountToken'])
            ->withBillingMethodName(empty($data['billingMethodName']) ? null : $data['billingMethodName'])
            ->withDescription(empty($data['description']) ? null : $data['description']);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "billingMethodName" => $this->getBillingMethodName(),
            "description" => $this->getDescription(),
        );
    }
}