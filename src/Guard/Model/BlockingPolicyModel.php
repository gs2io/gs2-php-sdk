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

namespace Gs2\Guard\Model;

use Gs2\Core\Model\IModel;


class BlockingPolicyModel implements IModel {
	/**
     * @var array
	 */
	private $passServices;
	/**
     * @var string
	 */
	private $defaultRestriction;
	/**
     * @var string
	 */
	private $locationDetection;
	/**
     * @var array
	 */
	private $locations;
	/**
     * @var string
	 */
	private $locationRestriction;
	/**
     * @var string
	 */
	private $anonymousIpDetection;
	/**
     * @var string
	 */
	private $anonymousIpRestriction;
	/**
     * @var string
	 */
	private $hostingProviderIpDetection;
	/**
     * @var string
	 */
	private $hostingProviderIpRestriction;
	/**
     * @var string
	 */
	private $reputationIpDetection;
	/**
     * @var string
	 */
	private $reputationIpRestriction;
	/**
     * @var string
	 */
	private $ipAddressesDetection;
	/**
     * @var array
	 */
	private $ipAddresses;
	/**
     * @var string
	 */
	private $ipAddressRestriction;
	public function getPassServices(): ?array {
		return $this->passServices;
	}
	public function setPassServices(?array $passServices) {
		$this->passServices = $passServices;
	}
	public function withPassServices(?array $passServices): BlockingPolicyModel {
		$this->passServices = $passServices;
		return $this;
	}
	public function getDefaultRestriction(): ?string {
		return $this->defaultRestriction;
	}
	public function setDefaultRestriction(?string $defaultRestriction) {
		$this->defaultRestriction = $defaultRestriction;
	}
	public function withDefaultRestriction(?string $defaultRestriction): BlockingPolicyModel {
		$this->defaultRestriction = $defaultRestriction;
		return $this;
	}
	public function getLocationDetection(): ?string {
		return $this->locationDetection;
	}
	public function setLocationDetection(?string $locationDetection) {
		$this->locationDetection = $locationDetection;
	}
	public function withLocationDetection(?string $locationDetection): BlockingPolicyModel {
		$this->locationDetection = $locationDetection;
		return $this;
	}
	public function getLocations(): ?array {
		return $this->locations;
	}
	public function setLocations(?array $locations) {
		$this->locations = $locations;
	}
	public function withLocations(?array $locations): BlockingPolicyModel {
		$this->locations = $locations;
		return $this;
	}
	public function getLocationRestriction(): ?string {
		return $this->locationRestriction;
	}
	public function setLocationRestriction(?string $locationRestriction) {
		$this->locationRestriction = $locationRestriction;
	}
	public function withLocationRestriction(?string $locationRestriction): BlockingPolicyModel {
		$this->locationRestriction = $locationRestriction;
		return $this;
	}
	public function getAnonymousIpDetection(): ?string {
		return $this->anonymousIpDetection;
	}
	public function setAnonymousIpDetection(?string $anonymousIpDetection) {
		$this->anonymousIpDetection = $anonymousIpDetection;
	}
	public function withAnonymousIpDetection(?string $anonymousIpDetection): BlockingPolicyModel {
		$this->anonymousIpDetection = $anonymousIpDetection;
		return $this;
	}
	public function getAnonymousIpRestriction(): ?string {
		return $this->anonymousIpRestriction;
	}
	public function setAnonymousIpRestriction(?string $anonymousIpRestriction) {
		$this->anonymousIpRestriction = $anonymousIpRestriction;
	}
	public function withAnonymousIpRestriction(?string $anonymousIpRestriction): BlockingPolicyModel {
		$this->anonymousIpRestriction = $anonymousIpRestriction;
		return $this;
	}
	public function getHostingProviderIpDetection(): ?string {
		return $this->hostingProviderIpDetection;
	}
	public function setHostingProviderIpDetection(?string $hostingProviderIpDetection) {
		$this->hostingProviderIpDetection = $hostingProviderIpDetection;
	}
	public function withHostingProviderIpDetection(?string $hostingProviderIpDetection): BlockingPolicyModel {
		$this->hostingProviderIpDetection = $hostingProviderIpDetection;
		return $this;
	}
	public function getHostingProviderIpRestriction(): ?string {
		return $this->hostingProviderIpRestriction;
	}
	public function setHostingProviderIpRestriction(?string $hostingProviderIpRestriction) {
		$this->hostingProviderIpRestriction = $hostingProviderIpRestriction;
	}
	public function withHostingProviderIpRestriction(?string $hostingProviderIpRestriction): BlockingPolicyModel {
		$this->hostingProviderIpRestriction = $hostingProviderIpRestriction;
		return $this;
	}
	public function getReputationIpDetection(): ?string {
		return $this->reputationIpDetection;
	}
	public function setReputationIpDetection(?string $reputationIpDetection) {
		$this->reputationIpDetection = $reputationIpDetection;
	}
	public function withReputationIpDetection(?string $reputationIpDetection): BlockingPolicyModel {
		$this->reputationIpDetection = $reputationIpDetection;
		return $this;
	}
	public function getReputationIpRestriction(): ?string {
		return $this->reputationIpRestriction;
	}
	public function setReputationIpRestriction(?string $reputationIpRestriction) {
		$this->reputationIpRestriction = $reputationIpRestriction;
	}
	public function withReputationIpRestriction(?string $reputationIpRestriction): BlockingPolicyModel {
		$this->reputationIpRestriction = $reputationIpRestriction;
		return $this;
	}
	public function getIpAddressesDetection(): ?string {
		return $this->ipAddressesDetection;
	}
	public function setIpAddressesDetection(?string $ipAddressesDetection) {
		$this->ipAddressesDetection = $ipAddressesDetection;
	}
	public function withIpAddressesDetection(?string $ipAddressesDetection): BlockingPolicyModel {
		$this->ipAddressesDetection = $ipAddressesDetection;
		return $this;
	}
	public function getIpAddresses(): ?array {
		return $this->ipAddresses;
	}
	public function setIpAddresses(?array $ipAddresses) {
		$this->ipAddresses = $ipAddresses;
	}
	public function withIpAddresses(?array $ipAddresses): BlockingPolicyModel {
		$this->ipAddresses = $ipAddresses;
		return $this;
	}
	public function getIpAddressRestriction(): ?string {
		return $this->ipAddressRestriction;
	}
	public function setIpAddressRestriction(?string $ipAddressRestriction) {
		$this->ipAddressRestriction = $ipAddressRestriction;
	}
	public function withIpAddressRestriction(?string $ipAddressRestriction): BlockingPolicyModel {
		$this->ipAddressRestriction = $ipAddressRestriction;
		return $this;
	}

    public static function fromJson(?array $data): ?BlockingPolicyModel {
        if ($data === null) {
            return null;
        }
        return (new BlockingPolicyModel())
            ->withPassServices(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('passServices', $data) && $data['passServices'] !== null ? $data['passServices'] : []
            ))
            ->withDefaultRestriction(array_key_exists('defaultRestriction', $data) && $data['defaultRestriction'] !== null ? $data['defaultRestriction'] : null)
            ->withLocationDetection(array_key_exists('locationDetection', $data) && $data['locationDetection'] !== null ? $data['locationDetection'] : null)
            ->withLocations(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('locations', $data) && $data['locations'] !== null ? $data['locations'] : []
            ))
            ->withLocationRestriction(array_key_exists('locationRestriction', $data) && $data['locationRestriction'] !== null ? $data['locationRestriction'] : null)
            ->withAnonymousIpDetection(array_key_exists('anonymousIpDetection', $data) && $data['anonymousIpDetection'] !== null ? $data['anonymousIpDetection'] : null)
            ->withAnonymousIpRestriction(array_key_exists('anonymousIpRestriction', $data) && $data['anonymousIpRestriction'] !== null ? $data['anonymousIpRestriction'] : null)
            ->withHostingProviderIpDetection(array_key_exists('hostingProviderIpDetection', $data) && $data['hostingProviderIpDetection'] !== null ? $data['hostingProviderIpDetection'] : null)
            ->withHostingProviderIpRestriction(array_key_exists('hostingProviderIpRestriction', $data) && $data['hostingProviderIpRestriction'] !== null ? $data['hostingProviderIpRestriction'] : null)
            ->withReputationIpDetection(array_key_exists('reputationIpDetection', $data) && $data['reputationIpDetection'] !== null ? $data['reputationIpDetection'] : null)
            ->withReputationIpRestriction(array_key_exists('reputationIpRestriction', $data) && $data['reputationIpRestriction'] !== null ? $data['reputationIpRestriction'] : null)
            ->withIpAddressesDetection(array_key_exists('ipAddressesDetection', $data) && $data['ipAddressesDetection'] !== null ? $data['ipAddressesDetection'] : null)
            ->withIpAddresses(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('ipAddresses', $data) && $data['ipAddresses'] !== null ? $data['ipAddresses'] : []
            ))
            ->withIpAddressRestriction(array_key_exists('ipAddressRestriction', $data) && $data['ipAddressRestriction'] !== null ? $data['ipAddressRestriction'] : null);
    }

    public function toJson(): array {
        return array(
            "passServices" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getPassServices() !== null && $this->getPassServices() !== null ? $this->getPassServices() : []
            ),
            "defaultRestriction" => $this->getDefaultRestriction(),
            "locationDetection" => $this->getLocationDetection(),
            "locations" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getLocations() !== null && $this->getLocations() !== null ? $this->getLocations() : []
            ),
            "locationRestriction" => $this->getLocationRestriction(),
            "anonymousIpDetection" => $this->getAnonymousIpDetection(),
            "anonymousIpRestriction" => $this->getAnonymousIpRestriction(),
            "hostingProviderIpDetection" => $this->getHostingProviderIpDetection(),
            "hostingProviderIpRestriction" => $this->getHostingProviderIpRestriction(),
            "reputationIpDetection" => $this->getReputationIpDetection(),
            "reputationIpRestriction" => $this->getReputationIpRestriction(),
            "ipAddressesDetection" => $this->getIpAddressesDetection(),
            "ipAddresses" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getIpAddresses() !== null && $this->getIpAddresses() !== null ? $this->getIpAddresses() : []
            ),
            "ipAddressRestriction" => $this->getIpAddressRestriction(),
        );
    }
}