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

/** Request for updateBillingMethod: Update payment method */
class UpdateBillingMethodRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Name */
    private $billingMethodName;
    /** @var string Description */
    private $description;
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
     * @return UpdateBillingMethodRequest
     */
	public function withAccountToken(?string $accountToken): UpdateBillingMethodRequest {
		$this->accountToken = $accountToken;
		return $this;
	}
    /** @return string|null Name */
	public function getBillingMethodName(): ?string {
		return $this->billingMethodName;
	}
    /** @param string|null $billingMethodName Name */
	public function setBillingMethodName(?string $billingMethodName) {
		$this->billingMethodName = $billingMethodName;
	}
    /**
     * @param string|null $billingMethodName Name
     * @return UpdateBillingMethodRequest
     */
	public function withBillingMethodName(?string $billingMethodName): UpdateBillingMethodRequest {
		$this->billingMethodName = $billingMethodName;
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
     * @return UpdateBillingMethodRequest
     */
	public function withDescription(?string $description): UpdateBillingMethodRequest {
		$this->description = $description;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBillingMethodRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateBillingMethodRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withBillingMethodName(array_key_exists('billingMethodName', $data) && $data['billingMethodName'] !== null ? $data['billingMethodName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "billingMethodName" => $this->getBillingMethodName(),
            "description" => $this->getDescription(),
        );
    }
}